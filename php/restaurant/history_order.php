<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require "../mysql/config.php";
    $sId = $_SESSION['sId'];
    $transactionSQL = "SELECT * FROM `transaction` WHERE process='3' AND sId = $sId;";
    $link->query($transactionSQL);    
    $transacticonRow = $link->getAllData();
    if ($link->getRowsNum() == 0) {
        echo "<h3 align='center'>沒有歷史訂單</h3>";
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
                <table class='table'>";
                $daySql = "SELECT DISTINCT LEFT(transTime,4) AS transYear FROM `transaction` WHERE sId = $sId ORDER BY transTime DESC;";
                $link->query($daySql);
                echo"
                    <form action='' align='center'> 
                        <select id='selectYear'>
                            <option value='%'>年份:</option>";                
                            while ($row = $link->getData()) {	
                                $day = $row['transYear'];
                                echo "<option value='$day'>$day</option>";
                            }
                            echo "<option value='%'>顯示全部紀錄</option>
                        </select>
                        <span id='selectMon'></span>
                        <span id='selectDate'></span>                        
                        <select id='selectOption'>
                            <option value='%'>篩選條件:</option>
                            <option value='timeDESC'>交易時間(由新到舊)</option>
                            <option value='timeASC'>交易時間(由舊到新)</option>
                            <option value='tnoDESC'>交易編號(由大到小)</option>
                            <option value='tnoASC'>交易編號(由小到大)</option>
                            <option value='priceDESC'>訂單總價(由大到小)</option>
                            <option value='priceASC'>訂單總價(由小到大)</option>
                            <option value=''>顯示全部</option>
                        </select>
                    </form>
                    <button type='button' id='resetRecord' style='float:right; border:3px; background:white;'>
                        <img class=draggable max128' src='../../images/icon/reset.png' style='width: 25px; height: 25px;'>
                    </button>
                ";   
    echo"
                    <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>訂單日期</th>
                            <th>訂單總價</th>
                            <th>訂單狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id='showRecord'>
    ";        
                    foreach ($recordSQL as $key => $value) {
                        $link->query($recordSQL[$key]);
                        $orderRow = $link->getData();
                        $totalPrice = $orderRow["totalPrice"];
                        echo"
                            <tr>
                                <td>#$tNo[$key]</td>
                                <td>$transTime[$key]</td>
                                <td>$totalPrice</td>
                                <td><span class='label label-success'>完成</span></td>
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
                <div class='modal-dialog ' role='document'>
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
                                                        <tr style='font-weight:600'>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
    echo "<input id='tNo' type='text' style='display: none;' value='$tNo'>";    
    echo "<script src='../../js/jquery_res_record.js'></script>";
?>
