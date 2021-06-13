<?php
if (!isset($_SESSION)) {
	session_start();
}
require "../../mysql/config.php";

$mId = $_SESSION['id'];
$likeSQL = "SELECT * FROM favorite F, product P WHERE mNo='$mId' AND P.pNo=F.pNo;";
$link->query($likeSQL);
$likeRow = $link->getRowsNum();
echo"
    <div class='dashboard-wrapper user-dashboard'>        
        <div class='total-order mt-20'>
            <span style='font-size:22px;font-weight:600'>喜愛商品</span>
            <div class='table-responsive'>
                <table class='table'>";                
                echo"
                    <thead>
                        <tr>
                            <th>商品編號</th>
                            <th></th>
                            <th>商品名稱</th>
                            <th>商品價格</th>
                            <th>新增日期</th>
                            <th></th> 
                            <th></th>                           
                        </tr>
                    </thead>
                    <tbody id='showRecord'>";
                    if ($likeRow == 0) {
                        echo "<tr><td><h3>沒有喜愛項目</h3></td></tr>";
                        exit();
                    }               
                    while($likeRow = $link->getData()){
                        $pNo1[] = $likeRow["pNo"];
                        $productImage[] = $likeRow["image"];
                        $pNo = $likeRow["pNo"];
                        $price = $likeRow["pUnitPrice"];
                        $pName = $likeRow["pName"];
                        $likeTime = $likeRow["likeTime"];
                        $image = $likeRow["image"];
                        echo"
                        <tr id='likelist$pNo'>
                            <td>#$pNo</td>
                            <td>
                                <img class='media-object comment-avatar' src='../../images/$image' alt='商品' width='40' height='40' />
                            </td>
                            <td style='font-weight:600'>$pName</td>
                            <td>$price</td>                            
                            <td>$likeTime</td>                            
                            <td>
                                <a href='../page/product-details.php?pNo=$pNo'>
                                    <span>
                                        <li class='btn btn-default'style='font-weight:500'>View</li>
                                    </span>
                                </a>
                            </td>
                            <td>
                                <button type='button' id='like$pNo' class='tf-ion-ios-heart' style='height:30px;weight:50px;background:white' value='1'></button>
                                <input id='pNo$pNo' type='text' style='display: none;' value='$pNo'>
                            </td>
                        </tr>
                        ";
                    }
                    echo "<input id='countI' type='text' style='display: none;' value='$pNo'>";
echo                 "</tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    ";
echo"        
    <script src='../../js/jquery_record.js'></script>
    <script src='../../js/jquery_like.js'></script>
    ";
?>