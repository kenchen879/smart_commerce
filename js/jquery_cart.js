$(function() {
    var totalI = $("#countI").val();
    var count = 1;
    for (let i = 1; i <= totalI; i++) {
        $("#quantity" + i).click(function() {
            var pNo = $("#productNo" + i).val();
            var quantity = $("#quantity" + i).val();
            var price = $("#price" + i).val();
            var total = quantity * price;
            $("#totalprice" + i).html(total);

            $.post("../ajax/changeCart.php", { quantity: quantity, pNo: pNo }, function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                }
            });
            $.post("../show/showTotalPrice.php", function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#total").html("總價 : " + msg + " 元");
                }
            });

        });
        $("#remove" + i).click(function() {
            count++;
            var pNo = $("#productNo" + i).val();
            var quantity = 0;
            $.post("../ajax/changeCart.php", { quantity: quantity, pNo: pNo }, function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {}
            });
            if (count == totalI) {
                alert('購物車已空~前往商品頁!');
                window.location.href = "shop.php";
                return;
            } else {
                $("#cartRow" + i).remove();
            }
        });
    }
})