<?php
// Initialize the session
session_start();
require_once "../mysql/config.php";
$ID = $_SESSION['id'];
$time = date("Y-m-d h:i:s");
$onlineSQL = "UPDATE `online` SET onTime = '$time', online = 0 WHERE mId = '$ID';";
$link->query($onlineSQL);

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>