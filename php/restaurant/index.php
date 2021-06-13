<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["resloggedin"]) {
    header("location: ../member/login.php");
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
    <script src="../../js/jquery_res.js"></script>
</head>

<body id="body">
    <!--headerbar-->
    <?php include "../../share/res_headerbar.php";?>
    <!--//headerbar-->
   
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name" style="font-weight:500">網站管理</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php" style="font-weight:500">首頁</a></li>
                            <li class="active"> <a style="font-weight:500">shop</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="products section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget">
                        <!-- <button id="dashboard" type="button" class="btn btn-main btn-small btn-round-full">Dashboard</button><br><br> -->
                        <button id="order" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">目前訂單</button><br><br>
                        <button id="history_order" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">歷史訂單</button><br><br>
                        <button id="sale" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">銷售狀態</button><br><br>
                        <button id="product" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">所有產品</button><br><br>
                        <button id="insert" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">新增產品</button><br><br>
                        <button id="member" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">會員資料</button><br><br>
                        <button id="contact" type="button" class="btn btn-main btn-small btn-round-full" style="font-weight:500">會員回饋</button><br>                        
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div id="present">
                        <?php 
                            require_once "order.php";
                        ?>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!--Essential Scripts-->
    
    <!--//Essential Scripts-->
</body>

</html>
