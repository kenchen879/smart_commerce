<?php        
    include "../mysql/config.php";
    session();
    //找出最大pNo
    $maxpNoSQL = "SELECT MAX(pNo) as mpNo FROM product;";
    $link->query($maxpNoSQL);
    $maxpNoRow = $link->getData();
    $maxpNo = $maxpNoRow['mpNo'];

    $pNo = isset($_GET["pNo"]) ? $_GET["pNo"] : 1;
    $countCommentSQL = "SELECT count(*) AS boardNumber FROM board WHERE pNo=$pNo;";
    $link->query($countCommentSQL);
    $countRow = $link->getData();
    $count = $countRow["boardNumber"];    
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
        <script src="../../js/jquery_sentcart.js"></script>
        <script src="../../js/jquery_sentcomment.js"></script>
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
                            <h1 class="page-name" style="font-weight: 600">產品</h1>
                            <ol class="breadcrumb">
                                <li><a href="../page/" style="font-weight: 600">首頁</a></li>
                                <li class="active"><a href="../page/shop.php" style="font-weight: 600">商店</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="single-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <div class="content">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="product-pagination text-right">
                            <li>
                                <a href="../page/product-details.php?pNo=<?php echo ($pNo == 1) ? $pNo : $pNo-1;?>" style="font-weight:600">
                                <i class="tf-ion-ios-arrow-left"></i> 上一個 </a>
                            </li>
                            <li>
                                <a href="../page/product-details.php?pNo=<?php echo ($pNo == $maxpNo) ? $pNo : $pNo+1;?>" style="font-weight:600">下一個 <i class="tf-ion-ios-arrow-right"></i></a></li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-20">
                    
                    <!-- Show Product Detail -->
                    <?php require "../show/showProductDetail.php"; ?>
                    <!-- //Show Product Detail -->
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabCommon mt-20">
                            <ul class="nav nav-tabs">
                                <li class="active" id="boardButton"><a data-toggle="tab" href="#details" aria-expanded="true">留言區(<?php echo $count;?>)</a></li>
                            </ul>
                            <div class="tab-content patternbg">                                
                                <div id="details" class="tab-pane fade active in">
                                    <div class="post-comments">
                                        <ul class="media-list comments-list m-bot-50 clearlist">
                                            <!-- Show Product Comment -->
                                            <div id="present">
                                                <?php 
                                                    if ($count <= 5) {
                                                        require "../show/showComment.php";
                                                    }
                                                ?>                                             
                                            </div>                 
                                            <?php
                                                $mId = (isset($_SESSION["id"])) ? $_SESSION["id"] : "";
                                                $memberSQL = "SELECT imageName FROM member WHERE mNo='$mId';";
                                                $link->query($memberSQL);
                                                $memberRow = $link->getData();
                                                $image = (isset($memberRow['imageName'])) ? $memberRow['imageName'] : "member/happy.jpg";
                                                $display = (isset($_SESSION['loggedin'])) ? "" : "display: none";
                                            ?>                           
                                            <li class='media'>
                                                <span class='pull-left' style='<?php echo $display?>' >
                                                    <img class='media-object comment-avatar' src='../../images/<?php echo $image;?>' alt='' width='50' height='50' />
                                                </span>
                                                <div class='media-body'>             
                                                    <input type='textarea' id='messages' style='<?php echo $display?>' style='width:70%' name='account' class='form-control btn-round-full' placeholder='留言......'>
                                                    <input type='text' id='productNumber' style='display: none' value='<?php echo $pNo;?>'>
                                                </div>
                                            </li>                                            
                                            <!-- //Show Product Comment -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="products related-products section">
            <div class="container">
                <div class="row">
                    <div class="title text-center">
                        <h1 style="font-weight:600">相關產品</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">                                
                                <img class="img-responsive" src="../../images/shop/products/product-5.jpg" alt="product-img" style="height:300px;"/>
                                <div class="preview-meta">
                                    <ul>                                        
                                        <li>
                                            <a href="../page/product-details.php?pNo=5"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="../page/product-details.php?pNo=5">聖誕氣氛保暖襪 – 麋鹿款(深藍綠色)</a></h4>
                                <p class="price">$60</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="../../images/shop/products/product-1.jpg" alt="product-img" style="height:300px;"/>
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="../page/product-details.php?pNo=1"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="../page/product-details.php?pNo=1">造型黑白格紋 / 簡約紅白條紋</a></h4>
                                <p class="price">$150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="../../images/shop/products/product-2.jpg" alt="product-img" style="height:300px;"/>
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="../page/product-details.php?pNo=2"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="../page/product-details.php?pNo=2">聖誕氣氛保暖襪 – 星星款</a></h4>
                                <p class="price">$60</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="../../images/shop/products/product-3.jpg" alt="product-img" style="height:300px;"/>
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="../page/product-details.php?pNo=3"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="../page/product-details.php?pNo=3">聖誕氣氛保暖襪 – 麋鹿款(靛藍色)</a></h4>
                                <p class="price">$60</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <!-- Modal -->
        <div class="modal product-modal fade" id="product-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="tf-ion-close"></i>
	</button>
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="modal-image">
                                    <img class="img-responsive" src="../../images/shop/products/modal-product.jpg" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="product-short-details">
                                    <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                    <p class="product-price">$200</p>
                                    <p class="product-short-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                                    </p>
                                    <a href="" class="btn btn-main">Add To Cart</a>
                                    <a href="" class="btn btn-transparent">View Product Details</a>
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