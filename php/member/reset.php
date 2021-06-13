<?php

// Include config file
require_once "../mysql/config.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){    
	$ID = $_POST["id"];
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "請輸入新密碼.";
    } elseif(strlen(trim($_POST["new_password"])) < 4){
        $new_password_err = "密碼至少要4個字!";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "請輸入確認密碼.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "密碼不相符.";
        }
    }
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_err)){
        $pwd_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        // Prepare an update statement
        $sql = "UPDATE member SET mPassword = '$pwd_hashed' WHERE mNo = '$ID'";

        if($link->query($sql)){
            // Password updated successfully. Destroy the session, and redirect to login page            
            header("location: login.php");
            exit();
        } else{
        echo "發生錯誤，請稍後再試!";
        }
    }
}
?>
<!DOCTYPE html>

<html class="no-js">
<!--<![endif]-->

<head>
    <?php include "../../share/head.html";?>
</head>


<body id="body">

    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="../page">
                            <h1>smart</h1>
                        </a>
                        <h2 class="text-center">Welcome Back</h2>
                        <?php
            require_once "../mysql/config.php";
            $token = stripslashes(trim($_GET['token']));
            $email = stripslashes(trim($_GET['email']));
            $sql = "SELECT * FROM member WHERE mEmail='$email'";
            $msg="";
            $link->query($sql);
            $row = $link->getData();
            if($row){
              $id = $row['mNo'];              
              $mt = md5($row['mAccount'].$row['mName']);
              if($mt==$token){
                if(time()-$row['getPassTime']>24*60*60){
                  $msg = '該連結已過期';
                }else{
                  echo"
                    <form action='reset.php' method='post'>
                      <input type='hidden' name='id' value='$id'>
                      <div class='form-group'>
                        <label>新密碼</label>
                        <input type='password' name='new_password' class='form-control' value='$new_password'>
                        <span class='help-block'>$new_password_err</span>
                      </div>
                      <div class='form-group'>
                        <label>確認密碼</label>
                        <input type='password' name='confirm_password' class='form-control'>
                        <span class='help-block'>$confirm_password_err</span>
                      </div>
                      <input type='submit' value='確認更改'>
                    </form>";						
                }
              }else{
                echo '無效的連結';
              }
            }else{
              $msg =  '錯誤的連結!';	
            }
            echo $msg;
			    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->
</body>

</html>