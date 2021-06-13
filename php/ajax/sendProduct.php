<?php
    require_once "../mysql/config.php";
    session();
    $time = date('Y-m-d H:i:s', time());
    $mId = $_SESSION["id"];
    $pNo = $_POST["pNo"];
    $amount = $_POST["quantity"];        
    if($amount == 0){
        $msg = '數量必須大於0';
        echo $msg;
        exit;	
    }else{                
        $orderExistSQL = "SELECT * FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";                
        $link->query($orderExistSQL);
        $orderRow = $link->getData("MYSQLI_ASSOC");        
        if($link->getRowsNum() > 0){            
            $amount += $orderRow["amount"];
            $changeCartSQL = "UPDATE `cart` SET cartTime='$time' WHERE mNo='$mId' AND cartTime='".$orderRow["cartTime"]."';";
            $deleteOrderSQL = "DELETE FROM `order` WHERE mNo='$mId' AND pNo='$pNo';";
            $changeOrderSQL = "INSERT INTO `order`(pNo, mNo, cartTime, amount) VALUES ('$pNo', '$mId', '$time','$amount');";
            $link->query($deleteOrderSQL);
            $link->query($changeCartSQL);
            $link->query($changeOrderSQL);
            $msg = "成功修改購物車!";
        } else {
            $cartSQL = "INSERT INTO `cart`(mNo) VALUES ('$mId');"; 
            $orderSQL = "INSERT INTO `order`(pNo, mNo, cartTime, amount) VALUES ('$pNo', '$mId', '$time','$amount');";
            if($link->query($cartSQL) && $link->query($orderSQL)){
                $msg = '成功加入購物車!';
            }else{            
                $msg = 'noreg';
            }
        }                
        echo $msg;
    }        
?>