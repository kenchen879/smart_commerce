<?php
session_start();
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name_err = $password_err = $confirm_password_err = $email_err = $phone_err = $county_err = $district_err = $street_err="";
$name = $password = $confirm_password = $email = $phone = $county = $district = $street="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password = test_input($_POST["password"]);
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $county= test_input($_POST["county"]);
    $district= test_input($_POST["district"]);
    $street= test_input($_POST["street"]);

    /* 檢查密碼是否為空*/
    if(empty(trim($password))){
        $password_err = "請輸入新密碼";
    } elseif(strlen(trim($password)) < 4){
        $password_err = "密碼至少要4個字!";
    } else{
        $password = trim($password);
    }
    /* 檢查確認密碼*/
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "請輸入確認密碼";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "密碼不相符";
        }
    }
    /* 檢查信箱格式*/
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {        
        $email_err = "格式錯誤!";
    } else if(empty($email)){
        $email_err = "請輸入電子郵件!";
    }
    /* 檢查手機格式*/
    if (strlen($phone) != 10 && !empty($phone)) {
        $phone_err = "格式錯誤!";
    } else if(empty($phone)){
        $phone_err = "請輸入電話!";
    }        
    // Check input errors before updating the database
    if(empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($phone_err)){
        // Prepare an update statement
            $sql = "UPDATE member SET mName='$name', mPhone='$phone',mEmail='$email', mPassword='$password', mCounty='$county',mDistrict='$district',mStreet='$street';"; 

        if($link->query($sql)){
            // User inserted successfully. 
            session_start();
            $_SESSION['account'] = $account;
            $_SESSION['password'] = $password;
            header("location: login.php");
        } else{
            echo "發生錯誤，請稍後再試!";
        }
    }
    // Close connection
    $link->close();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Revolution Slider -->
  <link rel="stylesheet" type="text/css" href="plugins/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
  <link rel="stylesheet" type="text/css" href="plugins/revolution-slider/revolution/fonts/font-awesome/css/font-awesome.css">

  <!-- REVOLUTION STYLE SHEETS -->
  <link rel="stylesheet" type="text/css" href="plugins/revolution-slider/revolution/css/settings.css">
  <link rel="stylesheet" type="text/css" href="plugins/revolution-slider/revolution/css/layers.css">
  <link rel="stylesheet" type="text/css" href="plugins/revolution-slider/revolution/css/navigation.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
          <h1 class="text-center">SMART</h1>
          </a>
          <h2 class="text-center">Create</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name*</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password*</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" title='請填寫這個欄位!'>
                <label>Confirm Password*</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone*</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>E-mail*</label>
                <input type="text" name="email" id="emails" class="form-control" value="<?php echo $email; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($county_err)) ? 'has-error' : ''; ?>" style="width:220px;float:left">
                <label>county*</label>
                <input type="text" name="county" id="county" class="form-control" value="<?php echo $county; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $county_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>" style="width:220px;float:right">
                <label>district*</label>
                <input type="text" name="district" id="district" class="form-control" value="<?php echo $district; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $district_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($street_err)) ? 'has-error' : ''; ?>" style="width:100%;float:left">
                <label>street*</label>
                <input type="text" name="street" id="street" class="form-control" value="<?php echo $street; ?>" title='請填寫這個欄位!'>
                <span class="help-block"><?php echo $street_err; ?></span>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" >submit</button>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed-js/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/SyoTimer/build/jquery.syotimer.min.js"></script>
    
    <!-- Revolution Slider -->
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- Revolution Slider -->
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="plugins/revolution-slider/assets/warning.js"></script>  



    <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
  <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>