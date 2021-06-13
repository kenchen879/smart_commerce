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
    <script src="../../js/jquery_product.js"></script>
    <script src="../../js/jquery_like.js"></script>
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
                        <h1 class="page-name" style="font-weight: 600">商品</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page/" style="font-weight: 600">首頁</a></li>
                            <li class="active"><a style="font-weight: 600">商品</li>
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
                    <?php
                        require "../mysql/config.php";
                        $shopSql = "SELECT DISTINCT(sName) FROM shop;";
                        $link->query($shopSql);
                    ?>
                    <div class="widget">
                        <h4 class="widget-title"style="font-weight:600">商家</h4>
                        <form method="post" action="#">
                            <select class="form-control" id="sort2">
                                <option value="%">選擇</option>
                                <?php
                                    while($row = $link->getData())
                                        echo "<option>".$row['sName']."</option>";
                                ?>
                            </select>
                        </form>
                    </div>                    
                    <div class="widget">
                        <h4 class="widget-title" style="font-weight:600">排序</h4>
                        <form method="post" action="#">
                            <select class="form-control" id="sort" style="font-weight:600">
                            <option value="%">選擇</option>
                            <option value="0">價格(由高至低)</option>
                            <option value="1">價格(由低至高)</option>
                            <option value="2">銷售數量(由高至低)</option>
                            <option value="3">銷售數量(由低至高)</option>
                        </select>
                        </form>
                    </div>
                    <?php
                        $categorySql = "SELECT DISTINCT(category) FROM product;";
                        $link->query($categorySql);
                    ?>
                    <div class="widget product-category">
                        <h4 class="widget-title"style="font-weight:600">分類</h4>
                        <form method="post" action="#">
                            <select class="form-control" id="sort1">
                                <option value="%">選擇</option>
                                <?php
                                    while($row = $link->getData())
                                        echo "<option>".$row['category']."</option>";
                                ?>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div id="productShow">
                        <?php 
                            require_once "../show/showProduct.php";
                        ?>
                        </div>
                        
                    </div>
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