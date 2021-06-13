<?php	
	include "../mysql/config.php";
	session();
	$mNo = $_SESSION['id'];	
	$productSQL = "SELECT * FROM product P, `order` O WHERE P.pNo = O.pNo AND mNo = $mNo GROUP BY P.pNo;";
	$productALLSQL = "SELECT * FROM product P, `order` O WHERE P.pNo = O.pNo AND mNo = $mNo;";
	$link->query($productALLSQL);
	$totalPrice = 0;
	if ($link->getRowsNum() > 0) {
		if ($link->query($productSQL)) {
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
					<div id='cartRow$pNo' class='media'>
						<a class='pull-left' href='#'>
							<img class='media-object comment-avatar' src='../../images/$imageName' alt='商品' width='40' height='60' />
						</a>
						<div class='media-body'>
							<div><span>$productName</span></div>
							<div class='cart-price'>
								<span>$productAmount x</span>							
								<span>$productUnitPrice</span>
							</div>
							<h5><strong>$productTotalPrice</strong></h5>
							<input id='productNo$pNo' type='text' style='display: none;' value='$pNo'>
						</div>
						
					</div>
					";
				/** //Cart Item **/
			}
			echo "<input id='countII' type='text' style='display: none;' value='$pNo'>";
			echo "
				<div class='cart-summary'>
					<span>總價</span>
					<span id='total' class='total-price'>$$totalPrice</span>
				</div>
				<ul class='text-center cart-buttons'>
					<li><a href='../page/cart.php' class='btn btn-small'>查看購物車</a></li>
					<li><a href='../page/checkout.php' class='btn btn-small btn-solid-border'>結帳</a></li>
				</ul>";	
			echo "
				<script>
				$(function() {					
					var totalI = $('#countII').val();
					for (let i = 1; i <= totalI; i++) {
						$('#removecart' + i).click(function() {
							var pNo = $('#productNo' + i).val();
							$.post('../ajax/deleteCart.php', { pNo: pNo }, function(msg) { //表單送出
								if (msg == 'noreg') {
									alert('錯誤!請稍後再試');
								}
							});
							$('#cartRow' + i).remove();
							$.post('../show/showTotalPrice.php', function(msg) { //表單送出
								if (msg == 'noreg') {
									alert('錯誤!請稍後再試');
								} else {
									$('#total').html('$' + msg);
								}
							});
						});
					}
				})
				</script>
				";	
		} else{
			$msg = "noreg";
			echo $msg;
			exit();
		}
	} else{
		$msg = "沒有東西在購物車!<a href='../page/shop.php'>前往商品頁</a>";
		echo $msg;
	}
	
?>
