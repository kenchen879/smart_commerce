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
                        <h1 class="page-name" style="font-weight:600">新聞報導</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page" style="font-weight:600" >首頁</a></li>
                            <li class="active"> <a style="font-weight:600" >新聞報導</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="post" style="height:490px">
                        <div class="post-thumb">
                            <a href="">
                                <img class="img-responsive" src="images/blog/blog-post-1.jpg" alt="">
                            </a>
                        </div>
                        <h2 class="post-title">
                            <b><a target="_black" href="https://m.news.sina.com.tw/article/20201203/37051672.html">彰師大「社頭織襪」USR計畫 寒冬送襪給和美實驗學校</a></b>
                               
                        </h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="tf-ion-ios-calendar"></i> 2020年12月3日
                                </li>
                                <li>
                                    <i class="tf-ion-android-person"></i> 
                                    新浪新聞
                                </li>
                                <li>
                                    <i class="tf-ion-ios-pricetags"></i> SOCK, SMART Hosiery
                                </li>                                
                            </ul>
                        </div>
                        <div class="post-content">
                            <img class="img-responsive" src="../../images/news/news-1.jpg" alt="news-img" style="width:415px; height:300px;"/>
                            <a target="_black" href="https://m.news.sina.com.tw/article/20201203/37051672.html" class="btn btn-main">閱 讀 更 多</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="post" style="height:490px">
                        <div class="post-thumb">
                            <a href="">
                                <img class="img-responsive" src="images/blog/blog-post-2.jpg" alt="">
                            </a>
                        </div>
                        <h2 class="post-title">
                            <b><a target="_black" href="https://www.ilikeedit.com/m/newscont.php?NewsNo=16646467">少量多樣接單服務好 社頭織襪業者景氣低迷中異軍突起</a></b>
                        </h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="tf-ion-ios-calendar"></i> 2019年12月6日
                                </li>
                                <li>
                                    <i class="tf-ion-android-person"></i> 
                                    焦點新聞
                                </li>
                                <li>
                                    <i class="tf-ion-ios-pricetags"></i> SOCK, SMART Hosiery
                                </li>                                
                            </ul>
                        </div>
                        <div class="post-content">
                            <img class="img-responsive" src="../../images/news/news-2.jpg" alt="news-img" style="width:415px; height:300px;"/>   
                            <a target="_black" href="https://www.ilikeedit.com/m/newscont.php?NewsNo=16646467" class="btn btn-main">閱 讀 更 多</a>
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