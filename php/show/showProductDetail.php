<?php
    require "../mysql/config.php";
    $pNo = isset($_GET["pNo"]) ? $_GET["pNo"] : 1;
    $productSQL = "SELECT * FROM product P, shop S WHERE pNo = $pNo AND P.sId=S.sId;";
	$link->query($productSQL);
	$productRow = $link->getData();
    $productName = $productRow["pName"];
    $sName = $productRow["sName"];
	$productUnitPrice = $productRow["pUnitPrice"];
    $productDescription = $productRow["pDescription"];
    $productDescription = str_replace("&lt;br&gt;","<br>",$productDescription);
    $category = $productRow["category"];
    $productImage = $productRow["image"];
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin                           
        $log = 0;
    } else {
        $log = 1;
    }
    if (isset($_SESSION["id"])) {
        $mId = $_SESSION["id"];
        $likeSQL = "SELECT * FROM `favorite` WHERE mNo='$mId' AND pNo='$pNo';";
        $link->query($likeSQL);
        $likeRow = $link->getData();
        if($link->getRowsNum() > 0){                        
            $likeStyle = "tf-ion-ios-heart";
        } else {
            $likeStyle = "tf-ion-ios-heart-outline";
        }
    }
    $likeStyle = (isset($likeStyle))? $likeStyle : "tf-ion-ios-heart-outline";
    $imageSQL = "SELECT imageName FROM imagedb WHERE pNo=$pNo;";
    $link->query($imageSQL);
    echo "
    <div class='col-md-5'>
    <div class='single-product-slider'>
        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
            <div class='carousel-outer'>
                <!-- me art lab slider -->
                <div class='carousel-inner '>";
    echo"                
                    <div class='item active'>
                        <img src='../../images/$productImage' alt='' 
                            data-zoom-image='../../images/shop/single-products/product-1.jpg' style='width:460px;height:460px'/>
                    </div>";
                    while($imageRow = $link->getData()){
                        $image = $imageRow["imageName"];
                        echo"
                            <div class='item'>
                                <img src='../../images/$image' alt='' data-zoom-image='../../images/shop/single-products/product-2.jpg' 
                                    style='width:460px;height:460px' />
                            </div>";
                    }
                    
            echo"
                </div>
                <!-- sag sol -->
                <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                    <i class='tf-ion-ios-arrow-left'></i>
                </a>
                <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                    <i class='tf-ion-ios-arrow-right'></i>
                </a>
            </div>";
            $link->query($imageSQL);
            echo "
            <!-- thumb -->
            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                <li data-target='#carousel-custom' data-slide-to='0' class='active'>
                    <img src='../../images/$productImage' alt='' style='width:50px;height:50px' />
                </li>";
            for ($i=1; $i <= $link->getRowsNum(); $i++) {
                $imageRow = $link->getData();
                $image = $imageRow["imageName"];
                echo "
                    <li data-target='#carousel-custom' data-slide-to='$i'>
                        <img src='../../images/$image' alt='' style='width:50px;height:50px'/>
                    </li>
                ";
            }
            echo "
            </ol>
        </div>
    </div>
</div>
        ";
    echo "
        <div class='col-md-7'>
            <div class='single-product-details'>
                <h2 style='font-weight:600'>                
                    $productName
                </h2>
                <p class='product-price' style='color:black'>$
                    $productUnitPrice
                </p>
                <p class='product-description mt-20'>
                    $productDescription
                </p>
                <div class='product-size'>
                    <span>尺寸:</span>
                    <select class='form-control'>
                        <option>F</option>
                    </select>
                </div>
                <div class='product-quantity'>
                    <span>數量:</span>
                    <div class='product-quantity-slider'>
                        <input id='product-quantity".$pNo."' type='text' value='0' name='product-quantity'>
                    </div>
                </div>
                <div class='product-category'>
                    <span>分類:</span>
                    <ul>                        
                        <li><a href='#'>$category</a></li>
                    </ul>
                </div>
                <div class='product-category'>
                    <span>商家:</span>
                    <ul>                        
                        <li><a href='#'>$sName</a></li>
                    </ul>
                </div>
                <input id='productNo' type='text' style='display: none;' value='$pNo'>
                <button type='button' id='cart' class='btn btn-main mt-20' value='$log'>加入購物車</button>
                <button type='button' id='like$pNo' class='$likeStyle' style='height:30px;weight:50px;background:white;transform: translate(10px, 10px);' value='1'></button>
                <input id='countI' type='text' style='display: none;' value='$pNo'>
                <input id='pNo$pNo' type='text' style='display: none;' value='$pNo'>
            </div>
            <h5 id='chkmsg'></h5>
        </div>
        ";
    echo "<script src='../../js/jquery_like.js'></script>";
?>