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
                        <h1 class="page-name">Blog</h1>
                        <ol class="breadcrumb">
                            <li><a href="../page">首頁</a></li>
                            <li class="active">blog</li>
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
                            <b><a href="https://www.facebook.com/576778802481208/posts/1463608343798245/?d=n">7. 八卦山天空步道7號市集圓滿落幕</a></b>
                        </h2>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="tf-ion-ios-calendar"></i> 2019年5月18日
                                </li>
                                <li>
                                    <i class="tf-ion-android-person"></i> 
                                    張貼由
                                    <u><a href="https://www.facebook.com/sock.smart">SMART Hosiery 台明碩太·襪熊讚</a></u>
                                </li>
                                <li>
                                    <i class="tf-ion-ios-pricetags"></i> SOCK, SMART Hosiery
                                </li>                                
                            </ul>
                        </div>
                        <div class="post-content">
                            <p>
                                ⛱八卦山天空步道7號市集⛱<br>
                                圓滿落幕🎉🎉🎉<br>
                                謝謝大家的支持與捧場☺️☺️☺️<br>
                                也謝謝顧客給了我們一些建議🧐<br>
                                你們的回饋是我們成長的動力🙌<br>
                                ----------------------------------------<br>
                                市集賣完的襪子，蝦皮商城都還可以購買<br>
                                👉蝦皮🔍：台明·襪熊讚<br>
                                👉蝦皮賣場：
                                <a href="https://shopee.tw/socks.smart?v=4fa&smtt=0.0.4" style='color:skyblue;'>
                                    https://shopee.tw/socks.smart?v=4fa&smtt=0.0.4
                                </a><br>
                                歡迎大家來逛逛🧦🧦<br>
                                #台明，陪你走過每一個timing<br>
                                #台明，用心做好每一雙襪子<br>
                                #給您最好的品質
                            </p>
                            <a href="https://www.facebook.com/576778802481208/posts/1463608343798245/?d=n" class="btn btn-main">繼 續 閱 讀</a>
                        </div>
                    </div>
                </div>
            </div>              
            <div class="text-center">
                <ul class="pagination post-pagination">
                    <li>
                        <a href="../page/blog.php">Prev</a>
                    </li>
                    <li>
                        <a href="../page/blog.php">1</a>
                    </li>
                    <li class="active">
                        <a href="../page/blog2.php">2</a>
                    </li>                    
                </ul>
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