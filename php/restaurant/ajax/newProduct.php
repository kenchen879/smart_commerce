<?php
//連結資料庫
require_once "../../mysql/config.php";
session();
$sId = $_SESSION['sId'];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pName = (isset($_POST['pName'])) ? trim_input($_POST['pName']) : "";
    $pUnitPrice = (isset($_POST['pUnitPrice'])) ? trim_input($_POST['pUnitPrice']) : "";
    $pDescription = (isset($_POST['pDescription'])) ? trim_input($_POST['pDescription']) : "";
    // $pDescription = str_replace("\n", "<br>", $pDescription);
    $pDescription = htmlspecialchars_decode($pDescription);
    $category = (isset($_POST['category'])) ? trim_input($_POST['category']) : "";
    $file = (!empty($_FILES['userImage'])) ? $_FILES['userImage'] : "";
    // var_dump($file);
    /* 取得pNo */
    $pnoSQL = "SELECT pNo FROM product;";
    $link->query($pnoSQL);
    $pNo = 1;
    while($pnoRow = $link->getData()){
        $pNo++;
    }
    /* //取得pNo */
    $filePath[] = "";
    $fileLength = count($file['name']);
    $end_file0 = substr($file["name"][0], -4);
    $end_file = "";
    $filePath[0] = "shop/products/product-".$pNo.$end_file;
    if($fileLength > 5){
        echo "上傳圖片數量最多五張!";
    } else {
        for ($i=0; $i < $fileLength; $i++) {
            if ((($file["type"][$i] == "image/gif")
            || ($file["type"][$i] == "image/jpeg")
            || ($file["type"][$i] == "image/png")
            || ($file["type"][$i] == "image/jpg"))
            && ($file["size"][$i] < 300000000)) {
                if ($file["error"][$i] > 0) {
                    echo "Return Code: " . $file["error"][$i] . "<br />";
                } else {
                    $end_file = substr($file["name"][$i], -4);
                    //定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
                    $filePath[$i] = "shop/products/product-".$pNo."-".$i.$end_file;                    
                }
            } else {
                echo "必須為圖片檔!";//上傳失敗後顯示錯誤資訊
            }        
        }
        $filePath[0] = "shop/products/product-".$pNo.$end_file0;
        if($fileLength == 1){     
            $productSql = "INSERT INTO `product`(`pNo`, `pName`, `pUnitPrice`, `category`, `pDescription`, `image`, `sId`)
                                        VALUES ('$pNo', '$pName', '$pUnitPrice', '$category', '$pDescription', '".$filePath[0]."', $sId);";
            $end_file = substr($file["name"][0], -4);
            if($link->query($productSql)){
                move_uploaded_file(
                    $file["tmp_name"][0],
                    "../../../images/shop/products/product-".$pNo.$end_file0
                );
                echo "上傳成功!";
            } else{
                echo "上傳失敗!";
            }
        } else {
            $productSql = "INSERT INTO `product`(`pNo`, `pName`, `pUnitPrice`, `category`, `pDescription`, `image`, `sId`)
                                        VALUES ('$pNo', '$pName', '$pUnitPrice', '$category', '$pDescription', '".$filePath[0]."', $sId);";
            $end_file = substr($file["name"][0], -4);
            if($link->query($productSql)){
                move_uploaded_file(
                    $file["tmp_name"][0],
                    "../../../images/shop/products/product-".$pNo.$end_file0
                );
            } else{
                echo "上傳失敗!";
            }
            
            for ($i=1; $i < $fileLength; $i++) {
                $end_file = substr($file["name"][$i], -4);
                $imageSql = "INSERT INTO `imagedb`(`pNo`, `imageName`) VALUES ('$pNo', '".$filePath[$i]."');";
                if($link->query($imageSql)){
                    move_uploaded_file(
                        $file["tmp_name"][$i],
                        "../../../images/shop/products/product-".$pNo."-".$i.$end_file
                    );
                } else{
                    echo "上傳失敗!";
                }       
            }
            echo "上傳成功!";
        }
    }
}

?>
