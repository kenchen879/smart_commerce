<?php
require "../../mysql/config.php";
session();
echo "123";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pNo = (isset($_POST["pNo"])) ? trim_input($_POST["pNo"]) : "";
    $pName = (isset($_POST["pName"])) ? trim_input($_POST["pName"]) : "";
    $pUnitPrice = (isset($_POST["pUnitPrice"])) ? trim_input($_POST["pUnitPrice"]) : "";
    $pDescription = (isset($_POST["pDescription"])) ? trim_input($_POST["pDescription"]) : "";
    $category = (isset($_POST["category"])) ? trim_input($_POST["category"]) : "";
    // Validate credentials
    if(!empty($pName)){
        $sql = "UPDATE product SET pName = '$pName' WHERE pNo = '$pNo';";
        if($link->query($sql)){
            $msg = "success";
        } else {
            $msg = "noreg";
        }
    }
    if(!empty($pUnitPrice)){
        $sql = "UPDATE product SET pUnitPrice = '$pUnitPrice' WHERE pNo ='$pNo';";
        if($link->query($sql)){
            $msg = "success";
        } else {
            $msg = "noreg";
        }
    }
    if(!empty($pDescription)){
        $pDescription = htmlspecialchars_decode($pDescription);
        $sql = "UPDATE product SET pDescription = '$pDescription' WHERE pNo = '$pNo';";
        if($link->query($sql)){
            $msg = "success";
        } else {
            $msg = "noreg";
        }
    }
    if(!empty($category)){
        $sql = "UPDATE product SET category = '$category' WHERE pNo = '$pNo';";
        if($link->query($sql)){
            $msg = "success";
        } else {
            $msg = "noreg";
        }
    }
    echo $msg;
}
?>