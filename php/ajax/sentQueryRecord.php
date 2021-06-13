<?php
require_once ('../mysql/config.php');
session();
$transYear = (isset($_POST['transYear'])) ? $_POST['transYear']."-" : "%";
$transMonth = (isset($_POST['transMonth'])) ? $_POST['transMonth']. "-" : "%";
$transDay = (isset($_POST['transDay'])) ? $_POST['transDay']."%" : "%";
$transDate = $transYear.$transMonth.$transDay;
$selectOption = (isset($_POST['selectOption'])) ? $_POST['selectOption'] : "";
switch ($selectOption) {
    case 'timeDESC':
        $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' ORDER BY transTime DESC;";
        break;
    case 'timeASC':
        $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' ORDER BY transTime ASC;";
        break;
    case 'tnoDESC':
        $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' ORDER BY tNo DESC;";
        break;
    case 'tnoASC':
        $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' ORDER BY tNo ASC;";
        break;
    case 'priceDESC':
        $transactionSQL = "SELECT * FROM `transaction` T,`record` R WHERE process='3' AND T.tNo=R.tNo AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' GROUP BY R.tNo ORDER BY SUM(R.salePrice) DESC;";
        break;
    case 'priceASC':
        $transactionSQL = "SELECT * FROM `transaction` T,`record` R WHERE process='3' AND T.tNo=R.tNo AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' GROUP BY R.tNo ORDER BY SUM(R.salePrice) ASC;";
        break;
    default:
        $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."';";
        break;
}
$link->query($transactionSQL);    
$transacticonRow = $link->getAllData();
if ($link->getRowsNum() == 0) {
    echo "<h3 align='center'>沒有歷史訂單</h3>";
    exit();
} else{
    foreach ($transacticonRow as $key => $value) {
        $transTime[] = $transacticonRow[$key]["transTime"];
        $tNo[] = $transacticonRow[$key]["tNo"];        
        $recordSQL[] = "SELECT *, SUM(salePrice) AS totalPrice FROM `record` WHERE tNo = '".$tNo[$key]."' GROUP BY tNo;";
    }
    foreach ($recordSQL as $key => $value) {
        $link->query($recordSQL[$key]);
        $orderRow = $link->getData();
        $totalPrice = $orderRow["totalPrice"];
        echo"
            <tr>
                <td>#$tNo[$key]</td>
                <td>$transTime[$key]</td>
                <td>$  $totalPrice</td>                
                <td>
                    <span data-toggle='modal' data-target='#product-modal$tNo[$key]'>
                    <li class='btn btn-default'  style='font-weight:500'>View</li>
                    </span>
                </td>
            </tr>
        ";
    } 
}
?>
