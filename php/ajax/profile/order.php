<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require "../../mysql/config.php";
    $transactionSQL = "SELECT * FROM `transaction` WHERE mNo = '".$_SESSION['id']."' AND process != 3;";
    $link->query($transactionSQL);    
    $transacticonRow = $link->getAllData();
    if ($link->getRowsNum() == 0) {
        echo "<h3 align='center'>目前沒有訂單</h3>";
        exit();
    } else{
        foreach ($transacticonRow as $key => $value) {
            $transTime[] = $transacticonRow[$key]["transTime"];
            $tNo[] = $transacticonRow[$key]["tNo"];
            $process[] = $transacticonRow[$key]["process"];
            $recordSQL[] = "SELECT *, SUM(salePrice) AS totalPrice FROM `record` WHERE tNo = '".$tNo[$key]."' GROUP BY tNo;";
        }
    }
    echo"
        <div class='dashboard-wrapper user-dashboard'>
            <div class='table-responsive'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>訂單日期</th>
                            <th>訂單總價</th>
                            <th>訂單狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
    ";                        
                    foreach ($recordSQL as $key => $value) {
                        $link->query($recordSQL[$key]);
                        $orderRow = $link->getData();
                        $totalPrice = $orderRow["totalPrice"];
                        echo"
                            <tr id='orderRow$tNo[$key]'>
                                <td>#$tNo[$key]</td>
                                <td>$transTime[$key]</td>
                                <td>$totalPrice</td>";
                            switch ($process[$key]) {
                                case '0':
                                    echo "<td><span class='label label-warning'>待付款</span></td>";
                                    break;
                                case '1':
                                    echo "<td><span class='label label-info'>待出貨</span></td>";
                                    break;                                
                                case '2':
                                    echo "<td><span class='label label-primary'>出貨中</span></td>";
                                    break;
                                case '3':
                                    echo "<td><span class='label label-success'>完成</span></td>";
                                    break;
                                default:
                                    echo "<td><span class='label label-danger'>取消</span></td>";
                                    break;
                            }
                        echo"                            
                                <td>
                                    <span data-toggle='modal' data-target='#product-modal$tNo[$key]'>
                                        <li class='btn btn-default'style='font-weight:500'>View</li>
                                    </span>
                                </td>
                            </tr>
                        ";
                    }                    
    echo"                                                
                    </tbody>
                </table>
            </div>
        </div>
    ";
    $link->query($transactionSQL);
    while($transacticonRow = $link->getData()){
        $tNoArr[] = $transacticonRow["tNo"];
    }
    foreach ($tNoArr as $key => $value) {
        $recordSQLArr[] = "SELECT * FROM `record` R, product P WHERE P.pNo=R.pNo and R.tNo = '".$tNoArr[$key]."';";
    }
    foreach ($recordSQLArr as $key => $value) {
        $totalPrice = 0;
        $tNo = $tNoArr[$key];
        $link->query($recordSQLArr[$key]);
        echo"
            <div class='modal product-modal fade' id='product-modal$tNo'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <i class='tf-ion-close'></i>
                </button>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-body' style='padding:20px;'>
                            <div class='row'>
                                <div class='dashboard-wrapper user-dashboard'>
                                    <div class='table-responsive'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th>商品名稱</th>
                                                    <th>商品數量</th>
                                                    <th>商品總價</th>                                                    
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
            ";
                                                while ($orderRow = $link->getData()) {
                                                    $productName = $orderRow["pName"];
                                                    $salePrice = $orderRow["salePrice"];
                                                    $totalPrice += $salePrice;
                                                    $amount = $orderRow["amount"];                               
                                                    echo"
                                                        <tr>
                                                            <td>$productName</td>
                                                            <td>$amount</td>
                                                            <td>$salePrice</td>
                                                        </tr>
                                                    ";
                                                }
        echo"
                                            </tbody>                                                
                                        </table>
                                            <input id='tNo$tNo' type='text' style='display: none;' value='$tNo'>                                            
                                            <h3 style='float:right'>訂單總價: $totalPrice</h3><br>
                                            <button id='cancelOrder$tNo' type='button' class='btn btn-main btn-small'>取消訂單</button>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
    echo "<input id='tNo' type='text' style='display: none;' value='$tNo'>";
    echo"
        <script>
            $(function() {
                var totalI = $('#tNo').val();
                for (let i = 1; i <= totalI; i++) {
                    $('#cancelOrder' + i).click(function() {
                        if (confirm('確定刪除?')) {
                            var tNo = $('#tNo' + i).val();
                            $.post('../ajax/deleteOrder.php', { tNo: tNo }, function(msg) { //表單送出
                                if (msg == 'noreg') {
                                    alert('錯誤!請稍後再試');
                                } else {
                                    alert(msg);
                                    $('.close').click();
                                    $('#orderRow' + i).remove();
                                }
                            });
                        }                
                    });
                }
            })
        </script>
    ";
?>
