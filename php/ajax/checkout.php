<?php
    require_once "../mysql/config.php";
	session();
    $mId = $_SESSION["id"];
    $orderExistSQL = "SELECT * FROM `order` WHERE mNo='$mId';";
    if(!$link->query($orderExistSQL)){
        $msg = "發生錯誤!請稍後再試";        
    }else{
        $tNo="";
        $username = $_POST["username"];
        $usercounty = $_POST["usercounty"];
        $userdistrict = $_POST["userdistrict"];
        $useraddress = $_POST["useraddress"];
        $sId1 = $_POST["sId1"];
        $sId2 = $_POST["sId2"];
        if ($link->getRowsNum() == 0) {
            $msg = "沒有東西在購物車!";
        } else {
            $time = date('Y-m-d H:i');
            if ($sId1 == 1){
                $transactionInsertSQL = "INSERT INTO `transaction`(mNo,transTime,name,county,district,street,sId) 
                                    VALUES ('$mId', '$time', '$username', '$usercounty', '$userdistrict', '$useraddress', 1);";
                $link->query($transactionInsertSQL);
                $transactionExistSQL = "SELECT MAX(tNo) AS MtNo FROM `transaction` WHERE mNo='$mId';";
                $link->query($transactionExistSQL);
                $transactionRow = $link->getData();
                $tNo = $transactionRow["MtNo"];
                $orderExistSQL = "SELECT * FROM `order` O, `product` P, `shop` S
                                    WHERE O.pNo=P.pNo AND P.sId=S.sId AND O.mNo='$mId' AND S.sId=1;";
                $link->query($orderExistSQL);
                while ($orderRow = $link->getData()) {
                    $pNo = $orderRow["pNo"];
                    $amount = $orderRow["amount"];
                    $itemPrice = $orderRow["pUnitPrice"];
                    $salePrice = $amount * $itemPrice;                
                    $recordInsertSQL[] = "INSERT INTO `record`(tNo, pNo, salePrice, amount) VALUES ('$tNo', '$pNo', '$salePrice', '$amount');";                
                }
                foreach ($recordInsertSQL as $key => $value) {
                    $link->query($recordInsertSQL[$key]);
                }
            }
            if ($sId2 == 1){
                $transactionInsertSQL = "INSERT INTO `transaction`(mNo,transTime,name,county,district,street,sId) 
                                    VALUES ('$mId', '$time', '$username', '$usercounty', '$userdistrict', '$useraddress', 2);";
                $link->query($transactionInsertSQL);

                $transactionExistSQL = "SELECT MAX(tNo) AS MtNo FROM `transaction` WHERE mNo='$mId';";
                $link->query($transactionExistSQL);
                $transactionRow = $link->getData();
                $tNo = $transactionRow["MtNo"];
                $orderExistSQL = "SELECT * FROM `order` O, `product` P, `shop` S
                                    WHERE O.pNo=P.pNo AND P.sId=S.sId AND O.mNo='$mId' AND S.sId=2;";
                $link->query($orderExistSQL);
                while ($orderRow = $link->getData()) {
                    $pNo = $orderRow["pNo"];
                    $amount = $orderRow["amount"];
                    $itemPrice = $orderRow["pUnitPrice"];
                    $salePrice = $amount * $itemPrice;                
                    $recordInsertSQL2[] = "INSERT INTO `record`(tNo, pNo, salePrice, amount) VALUES ('$tNo', '$pNo', '$salePrice', '$amount');";                
                }
                foreach ($recordInsertSQL as $key => $value) {
                    $link->query($recordInsertSQL2[$key]);
                }
            }
            $orderDeleteSQL = "DELETE FROM `order` WHERE mNo = '$mId';";
            $cartDeleteSQL = "DELETE FROM `cart` WHERE mNo = '$mId';";
            $link->query($orderDeleteSQL);
            $link->query($cartDeleteSQL);
            $recordExistSQL = "SELECT * FROM `record` WHERE tNo='$tNo';";
            if($link->query($recordExistSQL)){
                $msg = 'success';
            }else{
                $msg = 'noreg';
            }            
        }
    }
    echo $msg;
?>
