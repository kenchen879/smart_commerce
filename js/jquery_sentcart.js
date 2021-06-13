$(function() {
    $("#cart").click(function() {
        if ($("#cart").val() == 0) {
            window.location.href = "../member/login.php";
            return;
        } else {
            var pNo = $("#productNo").val();
            var quantity = $("#product-quantity" + pNo).val();
            $("#cart").attr("disabled", "disabled").val('送出中..').css("cursor", "default");
            $.post("../ajax/sendProduct.php", { pNo: pNo, quantity: quantity }, function(msg) { //表單送出
                if (msg == "noreg") {
                    $("#chkmsg").html("失敗!請重新再試");
                    $("#cart").removeAttr("disabled").val('失 敗').css("cursor", "pointer");
                } else {
                    $("#chkmsg").html(msg);
                    $("#cart").val() == 1;
                    $("#cart").removeAttr("disabled").val('成 功').css("cursor", "pointer");
                }
            });
        }
    });
})