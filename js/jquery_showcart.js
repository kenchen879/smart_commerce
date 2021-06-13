$(function() {
    $("#showCart").mouseenter(function() {
        $.post("../show/showCart.php", function(msg) { //表單送出
            if (msg == "noreg") {
                $("#platform").html("錯誤!請稍後再試");
            } else {
                $("#platform").html(msg);
            }
        });
    });
})