<?php
    require "../mysql/config.php";    
	session();	
    $totalPriceSQL = "SELECT O.amount, P.pUnitPrice FROM `order` O, product P WHERE P.pNo=O.pNo AND O.mNo='".$_SESSION['id']."';";
    $link->query($totalPriceSQL);
    $total = 0;
    while($priceRow = $link->getData()){
        $total += $priceRow["amount"] * $priceRow["pUnitPrice"];
    }
    echo $total;
?>