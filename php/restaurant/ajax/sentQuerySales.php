<?php
require_once ('../../mysql/config.php');
session();
$sId = $_SESSION['sId'];
$transYear = (isset($_POST['transYear'])) ? $_POST['transYear']."-" : "%";
$transMonth = (isset($_POST['transMonth'])) ? $_POST['transMonth']. "-" : "%";
$transDay = (isset($_POST['transDay'])) ? $_POST['transDay']."%" : "%";
$transDate = $transYear.$transMonth.$transDay;
$selectOption = (isset($_POST['selectOption'])) ? $_POST['selectOption'] : "";
$selectOtherOption = (isset($_POST['selectOtherOption'])) ? $_POST['selectOtherOption'] : "";
switch ($selectOption) {
    case 'amountDESC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY saleAmount DESC;";
        break;
    case 'amountASC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY saleAmount ASC;";
        break;
    case 'priceDESC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount, SUM(R.amount)*P.pUnitPrice AS total FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY total DESC;";
        break;
    case 'priceASC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount, SUM(R.amount)*P.pUnitPrice AS total FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY total ASC;";
        break;
    case 'pnoDESC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY R.pNo DESC;";
        break;
    case 'pnoASC':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY R.pNo ASC;";
        break;
    default:
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo;";
        break;
}
switch ($selectOtherOption) {
    case 'allSale':
        $transactionSQL = "SELECT * FROM product P WHERE NOT EXISTS(
                                SELECT * FROM member M WHERE NOT EXISTS(
                                    SELECT * FROM transaction T, record R 
                                    WHERE P.pNo=R.pNo AND R.tNo=T.tNo AND T.mNo=M.mNo AND T.sId = $sId
                                )
                            );";
        break;
    case 'noSale':
        $transactionSQL = "SELECT * FROM product P WHERE NOT EXISTS(
                                SELECT * FROM member M WHERE EXISTS(
                                    SELECT * FROM transaction T, record R 
                                    WHERE P.pNo=R.pNo AND R.tNo=T.tNo AND T.mNo=M.mNo AND T.sId = $sId
                                )
                            );";
        break;    
    case 'mostSale':
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND T.sId = $sId
                            GROUP BY R.pNo
                            ORDER BY saleAmount DESC
                            LIMIT 1;";
        break;
    default:
        $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND transTime LIKE '$transDate' AND T.sId = $sId
                            GROUP BY R.pNo;";
        break;
}
$link->query($transactionSQL);    
if ($link->getRowsNum() == 0) {
    echo "<h3 align='center'>沒有商品訂購</h3>";
    exit();
} else{
    $totalPrice = 0;
    while ($transacticonRow = $link->getData()) {
        $pNo = $transacticonRow["pNo"];
        $pName = $transacticonRow["pName"];
        $pUnitPrice = isset($transacticonRow["pUnitPrice"]) ? $transacticonRow["pUnitPrice"] : 0;
        $pAmount = isset($transacticonRow["saleAmount"]) ? $transacticonRow["saleAmount"] : 0;
        $pPrice = $pUnitPrice * $pAmount;
        $totalPrice += $pPrice;
        echo"
            <tr>
                <td>#$pNo</td>
                <td>$pName</td>
                <td>$pAmount</td>
                <td>$$pPrice</td>
            </tr>
        ";
    }
    echo "
        <script>
            var totalSales = ".$totalPrice.";
            $('#totalPrice').html('總銷售額 : $' + totalSales);

        </script>
    ";
}
?>
