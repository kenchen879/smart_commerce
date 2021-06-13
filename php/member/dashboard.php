<?php
    if (!isset($_SESSION)) {
		session_start();
    }
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin
        header("location: login.php");
        exit();
    }    
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include "../../share/head.html";?>
    <script src="../../js/jquery_profile.js"></script>
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
                        <h1 class="page-name" style="font-weight:600">會員中心</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page"style="font-weight:600">首頁</a></li>
                            <li class="active"> <a style="font-weight:600">會員中心</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <button id="dashboard" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">會員資料</button>
                        <button id="order" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">目前訂單</button>
                        <button id="address" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">訂單地址</button>
                        <button id="profile" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">個人資料</button>
                        <button id="like" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">喜愛商品</button>
                        <button id="changepassword" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">更改密碼</button>
                        <!-- <button id="changephone" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:600">更改電話號碼</button> -->
                    </ul>
                    <div id="present">
                        
                    </div>
                </div>
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