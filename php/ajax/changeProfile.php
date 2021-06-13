<?php
require "../mysql/config.php";
session();
$id = $_SESSION["id"];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mName = (isset($_POST["mName"])) ? trim_input($_POST["mName"]) : "";
    $mEmail = (isset($_POST["mEmail"])) ? trim_input($_POST["mEmail"]) : "";
    $mPhone = (isset($_POST["mPhone"])) ? trim_input($_POST["mPhone"]) : "";    
    // Validate credentials
    if(!empty($mName)){
        $sql = "UPDATE member SET mName = '$mName' WHERE mNo = '$id';";
        if($link->query($sql)){
            $msg = "sucess";
        } else {
            $msg = "noreg";
        }
    }
    if(!empty($mEmail)){
        $sql = "UPDATE member SET mEmail = '$mEmail' WHERE mNo ='$id';";
        if($link->query($sql)){
            $msg = "sucess";
        } else {
            $msg = "noreg";
        }
    }
    if(!empty($mPhone)){
        $sql = "UPDATE member SET mPhone = '$mPhone' WHERE mNo = '$id';";
        if($link->query($sql)){
            $msg = "sucess";
        } else {
            $msg = "noreg";
        }
    }
    echo $msg;
}
?>