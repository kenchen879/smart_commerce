<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin
        header("location: ../member/login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include "../../share/head.html";?>
    <script src="../../js/jquery_cart.js"></script>
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
                        <h1 class="page-name" style="font-weight:600">購物車</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php" style="font-weight:600" >首頁</a></li>
                            <li class="active"> <a style="font-weight:600">購物車</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
        <div class="cart shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="block">
                            <div class="product-list">                                
                                <?php require "../show/showCartDetail.php";?>                                                  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer -->
    <?php include "../../share/footer.html";?>
    <!--//footer -->

    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->
</body>

</html>
