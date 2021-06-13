<?php
    require "../mysql/config.php";
    session();
    $memberSQL = "SELECT * FROM `member` M LEFT JOIN `online` O ON M.mNo=O.mId WHERE mAccount != 'smart123';";
    $link->query($memberSQL);
    if ($link->getRowsNum() == 0) {
        echo "<h3 align='center'>沒有會員</h3>";
        exit();
    }
    echo"
        <div class='dashboard-wrapper user-dashboard'>
            <div class='table-responsive'>
                <table class='table'>
                    <button type='button' id='resetMember' style='float:right; border:3px; background:white;'>
                    <img class=draggable max128' src='../../images/icon/reset.png' style='width: 25px; height: 25px;'>
                    </button>
                    <thead>
                        <tr>
                            <th>會員編號</th>
                            <th>會員姓名</th>
                            <th>會員電子郵件</th>
                            <th>會員生日</th>
                            <th>會員手機號碼</th>
                            <th>會員上線狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
    ";
                    while ($memberRow = $link->getData()) {
                        $mNo = $memberRow["mNo"];
                        $mNoArr[] = $memberRow["mNo"];
                        $mName = $memberRow["mName"];
                        $mEmail = $memberRow["mEmail"];
                        $mBirthday = $memberRow["mBirthday"];
                        $mPhone = $memberRow["mPhone"];                        
                        $online = $memberRow["online"];
                        if ($online == 1){
                            $online = "<span class='label label-success'>線上</span>";
                        } else {
                            $online = "<span class='label label-danger'>離線中</span>";
                        }
                        echo"
                            <tr id='orderRow'>
                                <td>#$mNo</td>
                                <td>$mName</td>
                                <td>$mEmail</td>
                                <td>$mBirthday</td>
                                <td>$mPhone</td>
                                <td>$online</td>
                                <td>
                                    <span data-toggle='modal' data-target='#product-modal$mNo'>
                                    <b class='btn btn-default' style='font-weight:600'>購買紀錄</b>
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
    //product-modal    
    foreach ($mNoArr as $key => $value) {
        $recordSQL[] = "SELECT * 
                        FROM `transaction` T, record R, product P 
                        WHERE T.mNo = '".$mNoArr[$key]."' AND T.process='3' AND P.pNo=R.pNo AND R.tNo=T.tNo;";
    }
    foreach ($recordSQL as $key => $value) {
        $totalPrice = 0;        
        $mNo = $mNoArr[$key];
        $link->query($recordSQL[$key]);
        echo"
            <div class='modal product-modal fade' id='product-modal$mNo'>
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
                                                    <th>交易時間</th>
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
                                                    $transTime = $orderRow["transTime"];
                                                    echo"
                                                        <tr>
                                                            <td>$productName</td>
                                                            <td>$amount</td>
                                                            <td>$salePrice</td>
                                                            <td>$transTime</td>
                                                        </tr>
                                                    ";
                                                }
        echo"
                                            </tbody>                                                
                                        </table>                                            
                                            <h3 style='float:right'>訂單總價: $totalPrice</h3><br>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
    echo "
        <script>
            $('#resetMember').click(function() {
                $.post('../restaurant/member.php', function(msg) { //表單送出
                    $('#present').html(msg);
                });
            });
        </script>
    ";
?>

