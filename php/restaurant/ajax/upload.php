<?php
    $pNo = isset($_GET["pNo"]) ? $_GET["pNo"] : "";
    //限制圖片型別格式，大小
    if ((($_FILES["userImage$pNo"]["type"] == "image/gif")
        || ($_FILES["userImage$pNo"]["type"] == "image/jpeg")
        || ($_FILES["userImage$pNo"]["type"] == "image/png")
        || ($_FILES["userImage$pNo"]["type"] == "image/jpg"))
        && ($_FILES["userImage$pNo"]["size"] < 300000000)) {
        if ($_FILES["userImage$pNo"]["error"] > 0) {
            echo "Return Code: " . $_FILES["userImage$pNo"]["error"] . "<br />";
        } else {                                    
            //連結資料庫
            include('../mysql/config.php');
            //定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
            $file = "shop/products/" . $_FILES["userImage$pNo"]["name"];
            $sql = "UPDATE product SET image = '$file' WHERE pNo='$pNo';";                
            if (!$link->query($sql)) {
                die('Error: ' . mysqli_errno($link->_dbConn));
            } else{
                move_uploaded_file(
                    $_FILES["userImage$pNo"]["tmp_name"],
                    "../../images/shop/products/".$_FILES["userImage$pNo"]["name"]
                );
                echo $file;
            }        
        }
    } else {       
        echo "noreg";//上傳失敗後顯示錯誤資訊
    }    
?>