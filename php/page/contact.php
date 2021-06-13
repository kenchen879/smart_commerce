<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $name = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
    $email = (isset($_SESSION["email"])) ? $_SESSION["email"] : "";
    $phone = (isset($_SESSION["phone"])) ? $_SESSION["phone"] : "";
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
    <script src='../../js/jquery_contact.js'></script>
</head>

<body id="body">
    <!--headerbar-->
    <?php include "../../share/headerbar.php";?>
    <!--//headerbar-->
    <!--mainmenu-->
    <?php include "../../share/mainmenu.html";?>
    <!--//mainmenu-->

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name" style="font-weight:600">聯絡我們</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page/index.php" style="font-weight:600" >首頁</a></li>
                            <li class="active"> <a style="font-weight:600" >聯絡</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper">
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="contact-form col-md-6 ">
                        <form id="contactform" method="" action="" role="form">
                            <div class="form-group">
                                <input type="text" placeholder="姓名" class="form-control" name="name" id="name" value='<?php echo $name?>'>
                            </div>

                            <div class="form-group">
                                <input type="email" placeholder="電子信箱" class="form-control" name="email" id="email" value='<?php echo $email?>'>
                            </div>

                            <div class="form-group">
                                <input type="phone" placeholder="電話" class="form-control" name="phone" id="phone" value='<?php echo $phone?>'>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="主旨" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group">
				                <textarea rows="3" cols='3' placeholder="留言(不能超過300個字)" class="form-control" name="message" id="message" maxlength=300></textarea>
                            </div>                      
                            <input type="text" style="display:none;" value="1" id='shop'/>
                            <div id="cf-submit">
                                <input type="submit" id="contact-submit" class="btn btn-transparent" value="送出">
                            </div>                            
                        </form>
                    </div>
                    <!-- ./End Contact Form -->
                    
                    <!-- Contact Details -->
                    <div class="contact-details col-md-6 ">                       
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.5719012591517!2d120.58233811476957!3d23.904794588777982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346934486db3950d%3A0x76cae0cc7b4b8f8f!2zNTEx5b2w5YyW57ij56S-6aCt6YSJ5ZOh6ZuG6Lev5LqM5q61NTk45be3MTXomZ8!5e0!3m2!1szh-TW!2stw!4v1601190866190!5m2!1szh-TW!2stw" width="500" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        <ul class="contact-short-info">
                            <li>
                                <i class="tf-ion-ios-home" style="font-weight:600" ></i>
                                <span style="padding:10px;color:#2F75AC;font-weight:600">台灣彰化縣社頭鄉員集路二段598巷15號</span>
                            </li>
                            <li>
                                <i class="tf-ion-android-phone-portrait" style="font-weight:600"></i>
                                <span style="padding:13px;color:#2F75AC;font-weight:600">電話 : 04-2492-9036</span>
                            </li>
                            <li>
                                <i class="tf-ion-android-mail" style="font-weight:600"></i>
                                <span style="padding:8px;color:#2F75AC;font-weight:600">電子信箱 : sales@smarthosiery.com</span>
                            </li>
                        </ul>
                        <!-- Footer Social Links -->
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a target="_black" href="https://www.facebook.com/sock.smart/">
                                        <i class="fb-icon" href="#"></i>
                                        <i class="tf-ion-social-facebook"></i></a></li>
                            </ul>
                        </div>
                        <!--/. End Footer Social Links -->
                    </div>
                    <!-- / End Contact Details -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </section>

    <!--footer -->
    <?php include "../../share/footer.html";?>
    <!--//footer -->

    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->
</body>

</html>
