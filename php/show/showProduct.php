<?php 		
    require "../mysql/config.php";
    session();
    $shop = $category = $sort = "";
    $shop = (isset($_POST["shop"])) ? $_POST["shop"] : null;
    $category = (isset($_POST["category"])) ? $_POST["category"] : null;
    $sort = (isset($_POST["sort"])) ? $_POST["sort"] : null;
    $productSQL = "SELECT * FROM product;";
    if (isset($shop) && isset($category) && isset($sort)){
        if ($sort == '0') {
            $productSQL = "SELECT * FROM product P, shop S 
                            WHERE P.sId = S.sId AND sName LIKE '$shop' AND category LIKE '$category' ORDER BY pUnitPrice DESC;";
        } else if ($sort == '1'){
            $productSQL = "SELECT * FROM product P, shop S 
                            WHERE P.sId = S.sId AND sName LIKE '$shop' AND category LIKE '$category' ORDER BY pUnitPrice ASC;";
        } else if ($sort == '2'){
            $productSQL = "SELECT P.pNo, P.pName, P.pUnitPrice, P.image, CASE WHEN SUM(R.amount) IS NULL THEN 0 ELSE SUM(R.amount) END AS saleAmount
                            FROM product P LEFT JOIN record R ON P.pNo=R.pNo, shop S                             
                            WHERE P.sId = S.sId AND sName LIKE '$shop' AND category LIKE '$category'
                            GROUP BY P.pNo 
                            ORDER BY saleAmount DESC;";
        } else if ($sort == '3'){
            $productSQL = "SELECT P.pNo, P.pName, P.pUnitPrice, P.image, CASE WHEN SUM(R.amount) IS NULL THEN 0 ELSE SUM(R.amount) END AS saleAmount
                            FROM product P LEFT JOIN record R ON P.pNo=R.pNo, shop S                             
                            WHERE P.sId = S.sId AND sName LIKE '$shop' AND category LIKE '$category'
                            GROUP BY P.pNo 
                            ORDER BY saleAmount ASC;";
        } else{
            $productSQL = "SELECT * FROM product P, shop S 
                            WHERE P.sId = S.sId AND sName LIKE '$shop' AND category LIKE '$category';";
        }
    }
    $link->query($productSQL);
    $productRow = $link->getAllData();
    if($link->getRowsNum()){
        foreach ($productRow as $key => $value) {        
            $pNo = $productRow[$key]["pNo"];
            $productName = $productRow[$key]["pName"];
            $productUnitPrice = $productRow[$key]["pUnitPrice"];
            $imageName = $productRow[$key]["image"];
            $saleAmountSQL = "SELECT SUM(amount) AS amount FROM `record` R
                            WHERE pNo=$pNo AND EXISTS (
                                SELECT * FROM `transaction` T WHERE T.tNo=R.tNo AND process=3) 
                            GROUP BY pNo;";
            $link->query($saleAmountSQL);
            $saleAmountRow = $link->getData();
            $saleAmount = isset($saleAmountRow["amount"]) ? $saleAmountRow["amount"] : 0;
            $saleAmount = isset($productRow[$key]["saleAmount"]) ? $productRow[$key]["saleAmount"] : $saleAmount;
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
            echo "
                <div class='col-md-4'>
                    <div class='product-item'>
                        <div class='product-thumb'>
                            <span class='bage'>Sale</span>                        
                            <img class='img-responsive' src='../../images/$imageName' alt='product-img' style='height:250px;'/>                    
                            <div class='preview-meta'>
                                <ul>
                                    <li>
                                        <a href='../page/product-details.php?pNo=$pNo'><i class='tf-ion-android-cart'></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='product-content'>
                                
                            <h4>
                                <a href='../page/product-details.php?pNo=$pNo'>$productName</a>                            
                            </h4><br>
                            
                            <h5>已銷售 $saleAmount 件
                            <input id='pNo$pNo' type='text' style='display: none;' value='$pNo'>
                            <button type='button' id='like$pNo' class='$likeStyle' style='height:30px;weight:50px;background:white' value='";
                            echo (isset($_SESSION['id'])) ? 1 : 0;
                            echo "'></button>
                            </h5>
                            <p class='price'>$$productUnitPrice</p>
                        </div>
                    </div>
                </div>
                ";
        }
        echo "<input id='countI' type='text' style='display: none;' value='$pNo'>";
        if (isset($shop) && $shop != '%' || $category == '%'){
            $shopSQL = "SELECT DISTINCT P.category FROM product P, shop S WHERE P.sId=S.sId AND S.sName='$shop';";
            $link->query($shopSQL);
            $var = '%';
            echo "<script>$('#sort1').html('<option value=$var>選擇</option>";
            while ($categoryRow = $link->getData()){
                $cat = $categoryRow['category'];
                echo "<option>$cat</option>";
            }            
            echo "');</script>";
        } else {            
            if (!isset($shop)){
                $shopSQL = "SELECT DISTINCT category FROM product;";
                $link->query($shopSQL);
                $var = '%';
                echo "<script>$('#sort1').html('<option value=$var>選擇</option>";
                while ($categoryRow = $link->getData()){
                    $cat = $categoryRow['category'];
                    echo "<option>$cat</option>";
                }            
                echo "');</script>";
            }
        }
    } else {
        echo "<h3 align='center'>沒有商品!</h3>";
    }
?>