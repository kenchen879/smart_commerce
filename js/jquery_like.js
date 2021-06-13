$(function() {
    var totalI = $("#countI").val();
    for (let i = 1; i <= totalI; i++) {
        $("#like" + i).click(function() {
            if ($("#like" + i).val() == 0) {
                window.location.href = "../member/login.php";
                return;
            } else {
                var pNo = $("#pNo" + i).val();
                $.post("../ajax/favoriteProduct.php", { pNo: pNo }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    } else if (msg == 'delete') {
                        alert("成功刪除喜愛商品!");
                        $("#like" + i).attr("class", "tf-ion-ios-heart-outline");
                    } else if (msg == 'insert') {
                        alert("成功加入喜愛商品!");
                        $("#like" + i).attr("class", "tf-ion-ios-heart");
                    }else{
                        alert(pNo);
                    }
                });
            }

        });
    }
})