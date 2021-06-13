<?php
    require "../mysql/config.php";
    session();
	$mNo = $_SESSION['id'];
	$productSQL = "SELECT *, SUM(amount) AS amount FROM product P, `order` O WHERE P.pNo=O.pNo AND mNo=$mNo GROUP BY P.pNo;";
	$link->query($productSQL);
    $totalPrice = 0;
    $i = 1;
    if ($link->getRowsNum() > 0) {
        echo "
            <table class='table'>
                <thead>
                    <tr>
                        <th class=''>商品名稱</th>
                        <th class=''>商品單價</th>
                        <th class=''>數量</th>
                        <th class=''>總價</th>                                                
                    </tr>
                </thead>
            <tbody>
            ";
        while ($productRow = $link->getData()) {
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
                <tr id='cartRow$pNo' class=''>
                    <td class=''>
                        <div class='product-info'>
                            <img  src='../../images/$imageName' alt='' style='width:50px;height:50px;'/>
                            <span style='font-weight:600'>$productName</span>
                        </div>
                    </td>
                    <td class=''>$$productUnitPrice</td>
                    <input id='price$pNo' type='text' style='display: none;' value='$productUnitPrice'>
                    <td class=''>
                        <input type='number' id='quantity$pNo' name='quantity$pNo' min='1' max='100' value='$productAmount'/> 
                        <input id='productNo$pNo' type='text' style='display: none;' value='$pNo'>
                    </td>
                    <td class=''>$
                        <span id='totalprice$pNo'>$productTotalPrice</span>
                    </td>
                    <td class=''>
                        <button type='button' id='remove$pNo' class='btn btn-main btn-small btn-round-full'>刪除</button>
                    </td>
                </tr>";
            /** //Cart Item **/
            $i++;
        }
        echo "<input id='countI' type='text' style='display: none;' value='$pNo'>";
        echo "
                </tbody>
            </table>
            <div id='total' style='float:right'>總價 : $totalPrice 元</div><br><br>                                  
            <a href='checkout.php' class='btn btn-main pull-right'>Checkout</a>
            ";
    } else {
        echo "
            <section class='empty-cart page-wrapper'>
                <div class='row'>
                    <div class='block text-center'>
                        <i class='tf-ion-ios-cart-outline'></i>
                        <h2 class='text-center'>你的購物車目前已空!</h2><br>
                        <a href='shop.php' class='btn btn-main btn-medium btn-round-full  btn-icon'>前往商品頁面</a>
                    </div>
                </div>
            </section>
            ";
    }
?>
