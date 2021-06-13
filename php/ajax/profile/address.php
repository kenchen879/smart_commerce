<?php
if (!isset($_SESSION)) {
    session_start();
}
require "../../mysql/config.php";
$mId = $_SESSION['id'];
$transactionSQL = "SELECT * FROM `transaction` WHERE mNo=$mId;";
$link->query($transactionSQL);

echo "<div class='dashboard-wrapper user-dashboard'>
    <div class='table-responsive'>
        <table class='table'>
            <thead>
                <tr>
                    <th>訂單編號</th>
                    <th>收件者姓名</th>
                    <th>收件地址</th>                    
                </tr>
            </thead>
            <tbody>
    ";
    while($transacitonRow = $link->getData()){
        $tNo = $transacitonRow["tNo"];
        $address = $transacitonRow["county"].$transacitonRow["district"].$transacitonRow["street"];
        $name = $transacitonRow["name"];
        echo"
                <tr>
                    <td>#$tNo</td>
                    <td>$name</td>
                    <td style='font-weight:500'>$address</td>                    
                </tr>";
    }
    echo"
            </tbody>
        </table>
    </div>
</div>";
?>