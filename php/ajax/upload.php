<?php
    if (!isset($_SESSION)) {
		session_start();
    }
    //限制圖片型別格式，大小
    if ((($_FILES["userImage"]["type"] == "image/gif")
        || ($_FILES["userImage"]["type"] == "image/jpeg")
        || ($_FILES["userImage"]["type"] == "image/png")
        || ($_FILES["userImage"]["type"] == "image/jpg"))
        && ($_FILES["userImage"]["size"] < 300000000)) {
        if ($_FILES["userImage"]["error"] > 0) {
            echo "Return Code: " . $_FILES["userImage"]["error"] . "<br />";
        } else {                                    
            //連結資料庫
            include('../mysql/config.php');
            //定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
            $file = "member/" . $_FILES["userImage"]["name"];
            $sql = "UPDATE member SET imageName = '$file' WHERE mNo='".$_SESSION['id']."';";                
            if (!$link->query($sql)) {
                die('Error: ' . mysqli_errno($link->_dbConn));
            } else{
                move_uploaded_file(
                    $_FILES["userImage"]["tmp_name"],
                    "../../images/member/".$_FILES["userImage"]["name"]
                );
                echo $file;
            }        
        }
    } else {       
        echo "noreg";//上傳失敗後顯示錯誤資訊
    }    
?>