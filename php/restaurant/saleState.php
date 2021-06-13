<?php
    require "../mysql/config.php";
    session();
    $sId = $_SESSION['sId'];
    $transactionSQL = "SELECT *, SUM(R.amount) AS saleAmount FROM `transaction` T, record R, product P 
                            WHERE T.tNo=R.tNo AND R.pNo=P.pNo AND process='3' AND T.sId = $sId GROUP BY R.pNo;";    
    $link->query($transactionSQL);
    if ($link->getRowsNum() == 0) {
        echo "<h3 align='center'>沒有商品訂購</h3>";
        exit();
    }
    echo"
        <div class='dashboard-wrapper user-dashboard'>
            <div class='table-responsive'>
                <table class='table'>";
                $daySql = "SELECT DISTINCT LEFT(transTime,4) AS transYear FROM `transaction` WHERE sId = $sId ORDER BY transTime DESC;";
                $dayRes = $link->query($daySql);
                echo"
                    <form action='' align='center'> 
                        <select id='selectYear'>
                            <option value=''>年份:</option>";                
                            while ($row = $dayRes->fetch_assoc()) {	
                                $day = $row['transYear'];
                                echo "<option value='$day'>$day</option>";
                            }
                            echo "<option value='%'>顯示全部紀錄</option>
                        </select>
                        <span id='selectMon'></span>
                        <span id='selectDate'></span><br><br>
                        <select id='selectOption'>
                            <option value=''>篩選條件:</option>
                            <option value='amountDESC'>銷售數量(由大到小)</option>
                            <option value='amountASC'>銷售數量(由小到大)</option>
                            <option value='priceDESC'>銷售金額(由大到小)</option>
                            <option value='priceASC'>銷售金額(由小到大)</option>
                            <option value='pnoDESC'>商品編號(由大到小)</option>
                            <option value='pnoASC'>商品編號(由小到大)</option>                            
                            <option value='%'>顯示全部</option>
                        </select><br><br>
                        <select id='selectOtherOption'>
                            <option value=''>其他條件:</option>
                            <option value='allSale'>所有人都有買的產品</option>
                            <option value='noSale'>所有人都沒買的產品</option>
                            <option value='mostSale'>最多人購買的產品</option>
                            <option value='%'>顯示全部</option>
                        </select>
                    </form>
                    <button type='button' id='resetSales' style='float:right; border:3px; background:white;'>
                        <img class=draggable max128' src='../../images/icon/reset.png' style='width: 25px; height: 25px;'>
                    </button>
                ";   
    echo"
                    <thead>
                        <tr>
                            <th>商品編號</th>
                            <th>商品名稱</th>
                            <th>銷售數量</th>
                            <th>銷售總價</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id='showRecord'>
    ";
                    $link->query($transactionSQL);
                    $totalPrice = 0;
                    while($transacticonRow = $link->getData()){
                        $pNo = $transacticonRow["pNo"];
                        $pName = $transacticonRow["pName"];
                        $pUnitPrice = $transacticonRow["pUnitPrice"];
                        $pAmount = $transacticonRow["saleAmount"];
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
    echo"
                    </tbody>
                </table>
                <h3 style='float:right' id='totalPrice'>總銷售額 : $$totalPrice</h3>
            </div>
        </div>
    ";
    echo "<script src='../../js/jquery_res_sales.js'></script>";
?>
