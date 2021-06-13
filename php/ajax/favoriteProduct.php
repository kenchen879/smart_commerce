<?php
    require_once "../mysql/config.php";
    session();
    $time = date('Y-m-d H:i:s', time());
    $mId = $_SESSION["id"];
    $pNo = $_POST["pNo"];
    if(!isset($pNo)){
        $msg = "noreg";
        echo $msg;
        exit;	
    }else{
        $likeSQL = "SELECT * FROM `favorite` WHERE mNo='$mId' AND pNo='$pNo';";
        $link->query($likeSQL);
        $likeRow = $link->getData();
        if($link->getRowsNum() > 0){                        
            $deleteOrderSQL = "DELETE FROM `favorite` WHERE mNo='$mId' AND pNo='$pNo';";            
            $link->query($deleteOrderSQL);
            $msg = "delete";
        } else {
            $insertLikeSQL = "INSERT INTO `favorite`(mNo, pNo,likeTime) VALUES ('$mId', '$pNo', '$time');";
            if($link->query($insertLikeSQL)){
                $msg = 'insert';
            }else{
                $msg = 'noreg';
            }
        }                
        echo $msg;
    }        
?>