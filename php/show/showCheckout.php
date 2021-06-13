<?php
    require "../mysql/config.php";    
	$mNo = $_SESSION['id'];
	$productSQL1 = "SELECT *, SUM(amount) AS amount
                    FROM product P, `order` O
                    WHERE P.pNo=O.pNo AND mNo=$mNo AND sId = 1
                    GROUP BY P.pNo;";
	$link->query($productSQL1);
    if ($link->getRowsNum() > 0) {
        $totalPrice = 0;
        $productAll = $link->getAllData();
        $shopSQL = "SELECT * FROM shop WHERE sId=1;";
        $link->query($shopSQL);
        $shopRow = $link->getData();
        $sName = $shopRow['sName'];
        echo "            
            <h3><strong>商家 $sName</strong></h3>
            ";
        echo "
            <table class='table container'>
                <thead>
                    <tr>
                        <th class=''></th>
                        <th class=''></th>
                        <th class=''></th>
                        <th class=''></th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($productAll as $productRow) {
            $pNo = $productRow["pNo"];
            $productName = $productRow["pName"];
            $productAmount = $productRow["amount"];
            $productUnitPrice = $productRow["pUnitPrice"];
            $productDescription = $productRow["pDescription"];
            $imageName = $productRow["image"];
            $productTotalPrice = $productAmount * $productUnitPrice;
            $totalPrice += $productTotalPrice;
            /**  Cart Item **/
            echo "
                <tr id='cartRow'>
                    <td>
                        <div class='product-info'>
                            <img src='../../images/$imageName' alt='' style='width:40px;height:40px;'/>
                        </div>
                    </td>
                    <td>
                        $$productUnitPrice
                    </td>
                    <td>
                        x$productAmount
                    </td>
                    <td>$
                        <span id='totalprice'>$productTotalPrice</span>
                    </td>
                </tr>        
                ";
            /** //Cart Item **/         
        }        
        echo "
            <tr>
                <td></td>
                <td></td>
                <td>
                    運費 : 0
                </td>
                <td>
                    訂單金額 : $totalPrice
                </td>
            </tr>
                ";
        echo "</tbody>
            </table><br>
            ";        
        echo"<input type='text' value='1' id='sId1' style='display:none'/>";
    }  
    $productSQL2 = "SELECT *, SUM(amount) AS amount
                    FROM product P, `order` O
                    WHERE P.pNo=O.pNo AND mNo=$mNo AND sId = 2
                    GROUP BY P.pNo;";
	$link->query($productSQL2);
    if ($link->getRowsNum() > 0) {
        $totalPrice = 0;
        $productAll = $link->getAllData();
        $shopSQL = "SELECT * FROM shop WHERE sId=2;";
        $link->query($shopSQL);
        $shopRow = $link->getData();
        $sName = $shopRow['sName'];
        echo "            
            <h3><strong>商家 $sName</strong></h3>
            ";
        echo "
            <table class='table container'>
                <thead>
                    <tr>
                        <th class=''></th>
                        <th class=''></th>
                        <th class=''></th>
                        <th class=''></th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($productAll as $productRow) {
            $pNo = $productRow["pNo"];
            $productName = $productRow["pName"];
            $productAmount = $productRow["amount"];
            $productUnitPrice = $productRow["pUnitPrice"];
            $productDescription = $productRow["pDescription"];
            $imageName = $productRow["image"];
            $productTotalPrice = $productAmount * $productUnitPrice;
            $totalPrice += $productTotalPrice;
            /**  Cart Item **/
            echo "
                <tr id='cartRow' class=''>
                    <td class=''>
                        <div class='product-info'>
                            <img src='../../images/$imageName' alt='' style='width:40px;height:40px;'/>
                        </div>
                    </td>
                    <td class=''>
                        $$productUnitPrice
                    </td>
                    <td class=''>
                        x$productAmount
                    </td>
                    <td class=''>$
                        <span id='totalprice'>$productTotalPrice</span>
                    </td>
                </tr>        
                ";
            /** //Cart Item **/         
        }        
        echo "
            <tr>
                <td></td>
                <td></td>
                <td>
                    運費 : 0
                </td>
                <td>
                    訂單金額 : $totalPrice
                </td>
            </tr>
                ";
        echo "</tbody>
            </table><br>
            ";
        echo "<input type='text' value='1' id='sId2' style='display:none'/>";
    }  
?>
                    
