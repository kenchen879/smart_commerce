<?php
require "../mysql/config.php";
session();
$mNo = $_SESSION['id'];    
$newPasswordConfirm_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $origPassword = (isset($_POST["origPassword"])) ? trim_input($_POST["origPassword"]) : "";
    $newPassword = (isset($_POST["newPassword"])) ? trim_input($_POST["newPassword"]) : "";
    $newPasswordConfirm = (isset($_POST["newPasswordConfirm"])) ? trim_input($_POST["newPasswordConfirm"]) : "";

    // Check if password is equal
    if($newPassword != $newPasswordConfirm){
        $newPasswordConfirm_err = "輸入錯誤!";
        $msg = "錯誤!兩次密碼不一致!";
    }
    // Validate credentials
    if(empty($newPasswordConfirm_err)){
        // Prepare a select statement
		$sql = "SELECT mPassword FROM member WHERE mNo = ?";
        if($link->stmt_prepare($sql)){
            // Set parameters
            mysqli_stmt_bind_param($link->_stmt, "s", $mNo);
            if($link->stmt_execute_store()){
                if($link->stmt_row() == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($link->_stmt, $passwordCheck);
                    if(mysqli_stmt_fetch($link->_stmt)){
                        if(password_verify($origPassword, $passwordCheck)){
                            $newPassword_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                            $sql = "UPDATE member SET mPassword = '$newPassword_hash' WHERE mNo = '$mNo'";
                            if($link->query($sql)){
                                $msg = "success";
                            } else{
                                $msg = "發生錯誤!請重新再試!";
                            }
						} else{
                            // Display an error message if password is not valid
                            $msg = "密碼錯誤!";
                        }
                    } else{                            
                       $msg = "發生錯誤!請重新再試!";
                    }
                }else{                    
                    // Display an error message if username doesn't exist
                    $msg = "沒有此帳號!";                    
                }
            } 
        } else{
            $msg = "noreg";
        }        
        // Close statement
        mysqli_stmt_close($link->_stmt);
    }
    echo $msg;
}
?>