<?php
    if (!isset($_SESSION)) {
        session_start();   
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
                        <h1 class="page-name">F A Q</h1>
                        <ol class="breadcrumb">
                            <li><a href="index.php" style="font-weight:600">首頁</a></li>
                            <li class="active"style="font-weight:600">f.a.q</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper" style="font-weight:600">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>問與答</h2>
                    <p>問題回覆</p>                    
                    <p>smart@gmail.com</p>
                </div>
                <div class="col-md-8">
                    <h4><a style="font-weight:600"> 付款方式如何呢?</h4>
                    <p>目前以銀行匯款為主。</p><br>
                    <h4><a style="font-weight:600">運送方式及運費計算?</h4>
                    <p>目前以宅配到府為主，運費皆為新台幣100元，若消費滿1000元，則為免運喔。</p><br>
                    <h4><a style="font-weight:600">何時能拿到商品?</h4>
                    <p>付款後兩天內會進行出貨作業，出貨隔天就能到達喔。</p><br>
                    <h4><a style="font-weight:600">有哪些購買方式呢?</h4>
                    <p>我們具有多方管道，您可以從官網、臉書粉絲專頁、蝦皮或是電話下單。</p><br>
                    <h4><a style="font-weight:600">請問有實體商店嗎?</h4>
                    <p>目前我們是屬於觀光工廠的部分，若想要實體購買，請先來電告知，購買時間為平日週一到週五9:00~12:00及13:00~17:30。</p><br>
                    <h4><a style="font-weight:600">要如何追蹤商品狀態呢?</h4>
                    <p>在個人的檔案中可以查看商品狀態。</p>
                    <h3 style="float: left;"><a style="font-weight:600">其他問題請聯絡我們</h3>
                    <a href="contact.php"><img class="draggable" style="width: 30px; height: 30px;transform: translate(10px, 17px);" src="https://www.iconninja.com/files/480/996/841/mouse-click-left-icon.png"></a>
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