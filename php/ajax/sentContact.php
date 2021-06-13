<?php
// Include config file
require_once "../mysql/config.php";
session();

// Define variables and initialize with empty values
$phone = $name = $email = $message = $subject = $shop = "";
$time = date('Y-m-d H:i:s', time());
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = trim_input($_POST["name"]);
    $email = trim_input($_POST["email"]);
    $phone = trim_input($_POST["phone"]);
    $subject = trim_input($_POST["subject"]);
    $message = trim_input($_POST["message"]);
    $shop = trim_input($_POST["shop"]);
    $contactSql = "INSERT INTO `contact`(`name`, `contactTime`, `phone`, `email`, `subject`, `message`, `sId`) VALUES ('$name', '$time', '$phone', '$email', '$subject', '$message', '$shop');";
    if($link->query($contactSql)){
        echo "成功";
    } else{
        echo "noreg";
    }
    
}
?>
