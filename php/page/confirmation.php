<?php    
    require "../mysql/config.php";
    session();
    $recordSQL[] = $tNo[] = "";
    $transactionSQL = "SELECT *, MAX(tNo) AS MtNo FROM `transaction` WHERE mNo = '".$_SESSION['id']."';";
    $link->query($transactionSQL);
    $transacticonRow = $link->getData();
    $transTime = $transacticonRow["transTime"];
    array_push($tNo, $transacticonRow["MtNo"]);
    if ($transacticonRow["sId"] == 2){
        array_push($tNo, $transacticonRow["MtNo"]-1);
    }
    for ($i=1; $i < count($tNo); $i++) { 
        array_push($recordSQL, "SELECT *, SUM(salePrice) AS totalPrice FROM `record` WHERE tNo = '$tNo[$i]' GROUP BY tNo;");
    }        
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <?php include "../../share/head.html";?>
</head>

<body id="body">
    <!--headerbar-->
    <?php include "../../share/headerbar.php";?>
    <!--//headerbar-->
    <!--mainmenu-->
    <?php include "../../share/mainmenu.html";?>
    <!--//mainmenu-->
    <!-- Page Wrapper -->
    <section class="page-wrapper success-msg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <i class="tf-ion-android-checkmark-circle"></i>
                        <h2 class="text-center">Thank you! 感謝您的購買</h2>
                        <a href="shop.php" class="btn btn-main mt-20">繼續 購買</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="purchase-confirmation shopping">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="block ">
                                <div class="purchase-confirmation-details">
                                <?php
                                    for ($i=1; $i < count($tNo); $i++) {
                                        $link->query($recordSQL[$i]);
                                        $recordRow = $link->getData();
                                        $totalPrice = $recordRow["totalPrice"];
                                        $tNomber = $recordRow["tNo"];
                                ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width=50%><strong>訂單編號:</strong></th>
                                                <th width=50%><?php echo $tNomber;?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class=""><strong>付款狀態:</strong></td>
                                                <td class="">完成</td>
                                            </tr>
                                            <tr>
                                                <td><strong>支付方式:</strong></td>
                                                <td>貨到付款</td>
                                            </tr>
                                            <tr>
                                                <td><strong>交易日期:</strong></td>
                                                <td><?php echo $transTime;?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>小計:</strong></td>
                                                <td><?php echo $totalPrice;?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>總價:</strong></td>
                                                <td><?php echo $totalPrice;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                <?php } ?>
                                    <a href="../member/dashboard.php" class="btn btn-main mt-20" style="background-color: #00BFFF;">查看訂單</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.page-warpper -->
    <!--footer -->
    <?php include "../../share/footer.html";?>
    <!--//footer -->

    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->

</body>

</html>