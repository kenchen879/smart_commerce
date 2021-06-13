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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <?php include "../../share/head.html";?>
    <script src="../../js/jquery_cart.js"></script>
    <script src="../../js/jquery_checkout.js"></script>
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
                        <h1 class="page-name" style="font-weight:600">結帳</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page" style="font-weight:600" >首頁</a></li>
                            <li class="active"> <a style="font-weight:600">結帳</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
        <div class="checkout shopping">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="block billing-details">
                            <h4 class="widget-title" style="font-size:20px;color:#165F8D; font-weight:600">收件者資訊</h4>
                            <form class="checkout-form">
                                <div class="form-group">
                                    <label for="username">收件者姓名</label>
                                    <input type="text" class="form-control" id="username" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="usercounty">城市</label>
                                    <input type="text" class="form-control" id="usercounty" placeholder="">
                                </div>
                                <div class="checkout-country-code clearfix">
                                    <div class="form-group">
                                        <label for="userdistrict">鄉鎮市</label>
                                        <input type="text" class="form-control" id="userdistrict" name="zipcode" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="userzipcode">郵遞區號</label>
                                        <input type="text" class="form-control" id="userzipcode" name="city" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="useraddress">地址</label>
                                    <input type="text" class="form-control" id="useraddress" placeholder="">
                                </div>
                            </form>
                        </div>
                        <div class="block">
                            <h4 class="widget-title" style="font-size: 20px;font-weight:600;color:#165F8D">信用卡付款(安全付款)</h4>
                            <div class="checkout-product-details">
                                <div class="payment">
                                    <div class="card-details">
                                        <form class="checkout-form">
                                            <div class="form-group">
                                                <label for="card-number">信用卡卡號 <span class="required">*</span></label>
                                                <input id="card-number" class="form-control" type="tel" placeholder="•••• •••• •••• ••••">
                                            </div>
                                            <div class="form-group half-width padding-right">
                                                <label for="card-expiry">有效期限 <span class="required">*</span></label>
                                                <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                                            </div>
                                            <div class="form-group half-width padding-left">
                                                <label for="card-cvc">安全碼 <span class="required">*</span></label>
                                                <input id="card-cvc" class="form-control" type="tel" maxlength="4" placeholder="CVC">
                                            </div>
                                            <button type="button" id="checkout" class="btn btn-main mt-20">確認訂單</button>
                                            <span id="msg"></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
            <div class="col-md-4">
               <div class="product-checkout-details" style='font-family: "Lato", "Noto Sans TC", sans-serif;'>
                  <div class="block">
                     <h4 class="widget-title" style="font-size:20px;color:#165F8D; font-weight:600">訂單摘要</h4>
                     <div class="media product-card">
                     <div class='product-list'>                
                        <?php require "../show/showCheckout.php";?>                        
                    </div>
                        </div>
                            <ul class="summary-prices">
                                <li>
                                    <span>商品總金額:</span>
                                    <span class="price">$<?php require "../show/showTotalPrice.php"; ?></span>
                                </li>
                                <li>
                                    <span>運費總金額:</span>
                                    <span>0</span>
                                </li>
                            </ul>
                            <div class="summary-total">
                                <span>總付款金額</span>
                                <span>$<?php require "../show/showTotalPrice.php"; ?></span>
                            </div>
                            <div class="verified-icon">
                                <img src="../../images/shop/verified.png">
                            </div>
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