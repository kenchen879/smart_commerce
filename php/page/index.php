<?php
    session_start();
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
    <link rel="stylesheet" href="../../css/slider.css">
</head>

<body id="body">
    <!--headerbar-->
    <?php include "../../share/headerbar.php";?>
    <!--//headerbar-->
    <!--mainmenu-->
    <?php include "../../share/mainmenu.html";?>
    <!--//mainmenu-->
    <!--slidershow-->
    <?php include "../../share/slider.html";?>
    <!--//slidershow-->

    <!-- QUALITY section -->
    <section class="product-category section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="article-tilte">
                        <h3><a style="font-weight: 600"> QUALITY | 品質 </a></h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="showcase-011 content">
                        <div class="floatBox inner">
                            <!-- picture -->
                            <div>
                                <div class="item productBox">
                                    <img src="../../images/slider/slider-6.png">
                                </div>
                            </div>
                            <div>
                                <div class="item productBox">
                                    <img src="../../images/slider/slider-7.png">
                                </div>                                
                            </div>
                            <!-- //picture -->
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //QUALITY section -->
    <!-- Products -->
    <section class="products section bg-gray">
        <div class="container">
            <div class="col-md-12">
                <div class="article-tilte">
                    <h3><a style="font-weight: 600"> PRODUCT | 產品 </a></h3>
                </div>
            </div>
            <?php 		
                include "../mysql/config.php";
		        $productSQL = "SELECT *, SUM(R.amount) AS saleAmount
			        FROM product P, record R
                    WHERE P.pNo=R.pNo
                    GROUP BY P.pNo
                    ORDER BY sum(R.amount) DESC
                    LIMIT 3;";
                $link->query($productSQL);
                $product = $link->getAllData();
                foreach($product as $productRow){
                    $pNo = $productRow["pNo"];
                    $productName = $productRow["pName"];
                    $productUnitPrice = $productRow["pUnitPrice"];
                    $imageName = $productRow["image"];
                    $saleAmount = $productRow["saleAmount"];
                    echo "
                        <div class='col-md-4'>
                            <div class='product-item'>
                                <div class='product-thumb'>
                                    <span class='bage'>Sale</span>
                                    <img class='img-responsive' src='../../images/$imageName' alt='product-img' style='height:350px;'/>
                                    <div class='preview-meta'>
                                        <ul>
                                            <li>
                                                <a href='../page/product-details.php?pNo=$pNo'><i class='tf-ion-android-cart'></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class='product-content'>
                                    <h4><a href='../page/product-details.php?pNo=$pNo'>$productName</a></h4>
                                    <h5>已銷售 $saleAmount 件</h5>
                                    <p class='price'>$$productUnitPrice</p>
                                </div>
                            </div>
                        </div>
                        ";
                }
            ?>
        </div>
    </section>
    <!-- //Products -->    

    <!-- footer-->
    <?php include "../../share/footer.html";?>
    <!-- footer-->

    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->
    
</body>

</html>
