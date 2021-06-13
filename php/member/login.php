<?php
// Include config file
require_once "../mysql/config.php";

// Initialize the session
session();
// Define variables and initialize with empty values
$account = $password = "";
$account_err = $password_err = "";
$login = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $account = trim_input($_POST["account"]);
    $password = trim_input($_POST["password"]);
    $login = $_POST['login'];
    // Check if account is empty
    if(empty($account)){
        $account_err = "請輸入帳號!";
    }
    // Check if password is empty
    if(empty($password)){
        $password_err = "請輸入密碼!";
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        if ($login == 1) {
            $sql = "SELECT mNo, mAccount, mName, mPassword, mEmail, mPhone FROM member WHERE mAccount = ?";		
            if($link->stmt_prepare($sql)){
                // Set parameters
                mysqli_stmt_bind_param($link->_stmt, "s", $account);
                if($link->stmt_execute_store()){
                    if($link->stmt_row() == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($link->_stmt, $id, $account, $username, $passwordCheck, $email, $phone);
                        if(mysqli_stmt_fetch($link->_stmt)){                                                
                            if(password_verify($password, $passwordCheck)){
                                // Password is correct, so start a new session
                                session();
                                $time = date("Y-m-d h:i:s");                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["email"] = $email;
                                $_SESSION["phone"] = $phone;
                                $browseSql = "SELECT * FROM online WHERE mId = '$id';";
                                $link->query($browseSql);
                                if ($link->getRowsNum() == 0) {
                                    $onlineSql = "INSERT INTO `online`(mId, onTime, online) VALUES ('$id', '$time', 1);";
                                    $link->query($onlineSql);
                                } else {
                                    $onlineSql = "UPDATE `online` SET onTime = '$time', online = 1 WHERE mId='$id';";
                                    $link->query($onlineSql);
                                }
                                //Redirect user to welcome page
                                header("location: ../page");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "密碼錯誤!";
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $account_err = "沒有此帳號!";
                        $account ="";
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            } 
        } else {            
            $sql = "SELECT sId, sName, password FROM shop WHERE account = ?";		
            if($link->stmt_prepare($sql)){
                // Set parameters
                mysqli_stmt_bind_param($link->_stmt, "s", $account);
                if($link->stmt_execute_store()){
                    if($link->stmt_row() == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($link->_stmt, $sId, $sName, $passwordCheck);
                        if(mysqli_stmt_fetch($link->_stmt)){                                                
                            if($password == $passwordCheck){
                                // Password is correct, so start a new session
                                session();
                                // Store data in session variables
                                $_SESSION["resloggedin"] = true;
                                $_SESSION["sId"] = $sId;
                                $_SESSION["sName"] = $sName;                                                                                          
                                //Redirect user to welcome page
                                header("location: ../restaurant");
                            } else{
                                // Display an error message if password is not valid
                                $password_err = "密碼錯誤!";
                            }
                        } 
                    } else {
                        // Display an error message if username doesn't exist
                        $account_err = "沒有此帳號!";
                        $account ="";
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            } 
        }
		
        // Close statement
        mysqli_stmt_close($link->_stmt);
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <?php include "../../share/head.html";?>
</head>
<!-- <style>
     body{
        background: #4D91BB;
    } 
</style>  -->
<body id="body">

    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center" >
                    <!-- style='border: 5px solid #165F8D' -->
                  
                        <a class="logo" href="../page">
                            <img src="../../images/logo/logo.png" alt="logo" width="30%" height="10%"/>
                        </a>
                        <div id='member'>
                            <h2 class="text-center" style="font-weight:600">歡迎回來</h2>
                            <form class="text-left clearfix" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">                                
                                <div class="form <?php echo (!empty($account_err)) ? 'has-error' : ''; ?>">
                                        <input type="account" style="border:none;" name="account" value="<?php echo $account; ?>" autocomplete="off" required/>
                                        <label for="account" class="label-name">                                            
                                            <span class="content-name">帳號</span>                                                                                        
                                        </label>                                                                                
                                </div>
                                <div class="<?php echo (!empty($account_err)) ? 'has-error' : ''; ?>">                                        
                                        <span class="help-block"><?php echo $account_err; ?></span>
                                </div>
                                <div class="form <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">      
                                        <input type="password" style="border:none;" name="password" autocomplete="off" required/>
                                        <label for="password" class="label-name">                                            
                                            <span class="content-name">密碼</span>                                            
                                        </label>                                        
                                </div>
                                <div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">                                        
                                    <span class="help-block"><?php echo $password_err; ?></span>  
                                </div>
                                <div>
                                    <input type='radio' id='member1' name='login' value='1' checked/>
                                    <label for='member1'>會員</label>
                                    <input type='radio' id='shop' name='login' value='2'/>
                                    <label for='shop'>商家</label>
                                </div>
                                
                                <div class="text-center">     
                                    <button type="submit" class="btn btn-main text-center">登入</button>
                                </div>                                
                            </form>
                            <div id="forget"><a href="forget.php" style='float:right;font-weight:600'>忘記密碼</a></div><br>
                            <div class="mt-20" style="font-weight:600">第一次來到此網站 ?<a href="register.php"> 建 立 帳 號</a></div>
                        </div>
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