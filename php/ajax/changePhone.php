<?php
require "../mysql/config.php";
session();
$mNo = $_SESSION['id'];    
$newPhone_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $newPhone = (isset($_POST["newPhone"])) ? trim_input($_POST["newPhone"]) : "";
    // Validate credentials
    if(empty($newPhone_err)){
        $sql = "UPDATE member SET mPhone = '$newPhone' WHERE mNo = '$mNo'";
        if($link->query($sql)){
            $msg = "success";
        } else{
            $msg = "發生錯誤!請重新再試!";
        }
	} else{                            
        $msg = "發生錯誤!請重新再試!";
    }
} else{                            
    $msg = "發生錯誤!請重新再試!";
}
echo $msg;
?>