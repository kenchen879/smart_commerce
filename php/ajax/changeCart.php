<?php
    require_once "../mysql/config.php";
    session_start();
    $time = date('Y-m-d H:i:s', time());
    $mId = $_SESSION["id"];
    $pNo = $_POST["pNo"];
    $amount = $_POST["quantity"];        
    if($amount == 0){
        $orderExistSQL = "SELECT * FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";
        $deleteOrderSQL = "DELETE FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";
        $link->query($orderExistSQL);
        $orderRow = $link->getData();
        $deleteCartSQL = "DELETE FROM `cart` WHERE mNo='$mId' AND cartTime='".$orderRow["cartTime"]."';";
        $link->query($deleteOrderSQL);        
        $link->query($deleteCartSQL);
        $msg = '成功刪除';
        echo $msg;
    }else{                
        $orderExistSQL = "SELECT * FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";
        $link->query($orderExistSQL);
        $orderRow = $link->getData();        
        if($link->getRowsNum() > 0){            
            $amount;
            $changeCartSQL = "UPDATE `cart` SET cartTime='$time' WHERE mNo='$mId' AND cartTime='".$orderRow["cartTime"]."';";
            $deleteOrderSQL = "DELETE FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";
            $changeOrderSQL = "INSERT INTO `order`(pNo, mNo, cartTime, amount) VALUES ('$pNo', '$mId', '$time','$amount');";
            $link->query($deleteOrderSQL);
            $link->query($changeCartSQL);
            $link->query($changeOrderSQL);
            $msg = "成功!";
        } else {
            $cartSQL = "INSERT INTO `cart`(mNo) VALUES ('$mId');"; 
            $orderSQL = "INSERT INTO `order`(pNo, mNo, cartTime, amount) VALUES ('$pNo', '$mId', '$time','$amount');";
            if($link->query($cartSQL) && $link->query($orderSQL)){
                $msg = '成功!';
            }else{            
                $msg = 'noreg';
            }
        }                
        echo $msg;
    }        
?>