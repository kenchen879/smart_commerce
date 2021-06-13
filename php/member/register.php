<?php
if (!isset($_SESSION)) {
    session_start();
}
// Include config file
require_once "../mysql/config.php";

// Define variables and initialize with empty values
$account = $name = $password = $confirm_password = $birthday = $email = $phone = $county = $district = $street=$checkword="";
$account_err = $name_err = $password_err = $confirm_password_err = $birthday_err = $email_err = $phone_err = $county_err = $district_err =$street_err=$checkword_err="";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = trim_input($_POST["account"]);
    $password = trim_input($_POST["password"]);
    $confirm_password = trim_input($_POST["confirm_password"]);
    $name = trim_input($_POST["name"]);
    $birthday = trim_input($_POST["birthday"]);
    $email = trim_input($_POST["email"]);
    $phone = trim_input($_POST["phone"]);
    $county = trim_input($_POST["county"]);
    $district = trim_input($_POST["district"]);
    $street = trim_input($_POST["street"]);
    $checkword = trim_input($_POST["checkword"]);
    
    $emailExistSQL = "SELECT * FROM member WHERE mEmail='$email';";
    $accountExistSQL = "SELECT * FROM member WHERE mAccount='$account';"; 
    $link->query($accountExistSQL);
    /* 檢查帳號*/
    if (empty($account)) {
        $account_err = "請輸入帳號";
    } elseif (strlen($account) < 4) {
        $account_err = "帳號至少要4個字!";
    } elseif ($link->getRowsNum() > 0) {
	$account_err = "此帳號已註冊!";
    }
    if (empty($name)) {
        $name_err = "請輸入姓名";
    }
    /* 檢查密碼是否為空*/
    if (empty($password)) {
        $password_err = "請輸入密碼";
    } elseif (strlen($password) < 4) {
        $password_err = "密碼至少要4個字!";
    }
    /* 檢查確認密碼*/
    if (empty($confirm_password)) {
        $confirm_password_err = "請輸入確認密碼";
    } else {
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "密碼不相符";
        }
    }
    $link->query($emailExistSQL);
    /* 檢查信箱格式*/
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        $email_err = "格式錯誤!";
    } elseif (empty($email)) {
        $email_err = "請輸入電子郵件";
    } elseif ($link->getRowsNum() > 0) {
        $email_err = "此電子郵件已註冊!";
    }
    /* 檢查手機格式*/
    if (strlen($phone) != 10 && !empty($phone)) {
        $phone_err = "格式錯誤!";
    } elseif (empty($phone)) {
        $phone_err = "請輸入電話";
    }
    /* 檢查生日是否為空*/
    if (empty($birthday)) {
        $birthday_err = "請選擇生日";
    }
    /* 檢查縣市是否為空*/
    if (empty($county)) {
        $county_err = "請選擇地址";
    }
    /* 檢查鄉鎮市是否為空*/
    if (empty($district)) {
        $district_err = "請選擇地址";
    }
    /* 檢查街道是否為空*/
    if (empty($street)) {
        $street_err = "請輸入地址";
    }
    /* 檢查驗證碼*/
    if (empty($checkword)) {
        $checkword_err = "請輸入驗證碼";
    } else if($checkword != $_SESSION['check_word']){
        $checkword_err = "驗證碼錯誤";
    }
    // Check input errors before updating the database
    if (empty($account_err) && empty($name_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) &&
        empty($birthday_err) && empty($phone_err) && empty($checkword_err) && empty($county_err) && empty($district_err) && empty($street_err)) {
            //password hashing
            $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);
            // Prepare an insert statement               
            $sql = "INSERT INTO member(mName, mAccount, mPassword, mBirthday, mEmail, mCounty, mDistrict, mStreet, mPhone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $link->stmt_prepare($sql);
            mysqli_stmt_bind_param($link->_stmt,"sssssssss", $name, $account, $pwd_hashed, $birthday, $email, $county, $district, $street, $phone);
            if (mysqli_stmt_execute($link->_stmt)) {
                // User inserted successfully.
                header("location: login.php");
            } else {
                echo "發生錯誤，請稍後再試!";
            }
    }
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include "../../share/head.html";?>
    <script src="../../plugins/jquery/dist/jquery.twzipcode.min.js"></script>
</head>
<!-- <style>
     body{
        background: #4D91BB;
    } 
</style> -->

<body id="body">

    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="../page">
                            <img src="../../images/logo/logo.png" alt="logo" width="30%" height="10%"/>
                        </a>
                        <h2 class="text-center" style="font-weight:600">建立你的會員</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <!--帳號-->
                            <div class="form <?php echo (!empty($account_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                                <input type="account" style="border:none;" name="account" id="account" value="<?php echo $account; ?>" autocomplete="off" required/>
                                <label for="account" class="label-name">                                            
                                    <span class="content-name">帳號</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($account_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $account_err; ?></span>
                            </div>
                            <!--//帳號-->
                            <!--姓名-->
                            <div class="form <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                                <input type="text" style="border:none;" name="name" id="name" value="<?php echo $name; ?>" autocomplete="off" required/>
                                <label for="name" class="label-name">                                            
                                    <span class="content-name">姓名</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $name_err; ?></span>
                            </div>
                            <!--//姓名-->
                            <!--密碼-->
                            <div class="form <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                                <input type="password" style="border:none;" name="password" id="password" autocomplete="off" required/>
                                <label for="password" class="label-name">                                            
                                    <span class="content-name">密碼</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <!--//密碼-->
                            <!--確認密碼-->
                            <div class="form <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                                <input type="password" style="border:none;" name="confirm_password" id="confirm_password" autocomplete="off" required/>
                                <label for="confirm_password" class="label-name">                                            
                                    <span class="content-name">確認密碼</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>
                            <!--//確認密碼-->
                            <!--手機-->
                            <div class="form <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                                <input type="text" style="border:none;" name="phone" id="phone" value="<?php echo $phone; ?>" maxlength="10" title='請填寫這個欄位!' autocomplete="off" required/>
                                <label for="phone" class="label-name">                                            
                                    <span class="content-name">手機</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $phone_err; ?></span>
                            </div><br>
                            <!--//手機-->
                            <div class="form-group <?php echo (!empty($birthday_err)) ? 'has-error' : ''; ?>">
                                <input type="date" name="birthday" class="form-control" placeholder="生日" value="<?php echo $birthday; ?>">
                                <span class="help-block"><?php echo $birthday_err; ?></span>
                            </div>
                            <!--電子郵件-->
                            <div class="form <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <input type="text" style="border:none;" name="email" id="email" value="<?php echo $email; ?>" title='請填寫這個欄位!' autocomplete="off" required/>
                                <label for="email" class="label-name">                                            
                                    <span class="content-name">電子郵件</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $email_err; ?></span>
                            </div>
                            <!--//電子郵件-->     
                            <div class="form-group <?php echo (!empty($county_err)) ? 'has-error' : ''; ?>">
                                <div class="form-group" id="twzipcode"></div>
                                <span class="help-block"><?php echo $county_err; ?></span>
                            </div>
                            <!--街道-->
                            <div class="form <?php echo (!empty($street_err)) ? 'has-error' : ''; ?>">
                                <input type="text" style="border:none;" name="street" id="street" value="<?php echo $street; ?>" title='請填寫這個欄位!' autocomplete="off" required/>
                                <label for="street" class="label-name">                                            
                                    <span class="content-name">街道</span>                                                                                        
                                </label>                                                                                
                            </div>
                            <div class="<?php echo (!empty($street_err)) ? 'has-error' : ''; ?>">                                        
                                <span class="help-block"><?php echo $street_err; ?></span>
                            </div>
                            <!--//街道-->         
                            <div class="form-group <?php echo (!empty($checkword_err)) ? 'has-error' : ''; ?>">
                                <img id="imgcode" src="captcha.php" onclick="refresh_code()" title="點擊圖片可以更換驗證碼"/>
                                <input type="text" name="checkword" size="15" style="height:30px" maxlength="5" placeholder="圖形驗證碼" />
                                <span class="help-block"><?php echo $checkword_err; ?></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">註冊</button>
                            </div>

                        </form>
                        <p class="mt-20" style="font-weight:600">已經有帳號了?<a href="login.php" style="font-weight:600"> 登入</a></p>
                        <p><a href="forget.php"><button type="button" class="btn text-center" style="font-weight:600">忘記密碼</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Essential Scripts-->
    <script>
        $("#twzipcode").twzipcode({
            zipcodeIntoDistrict: true, // 郵遞區號自動顯示在區別選單中
            css: ["county form-control", "district form-control"], // 自訂 "城市"、"地別" class 名稱 
            countyName: "county", // 自訂城市 select 標籤的 name 值
            districtName: "district" // 自訂區別 select 標籤的 name 值
        });
    </script>
    <script>
        function refresh_code(){ 
            document.getElementById("imgcode").src="captcha.php"; 
        } 
    </script>
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->

</body>

</html>
