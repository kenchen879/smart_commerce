$(function() {
    $("#sort2").change(function() {
        $.post("../show/showProduct.php", { shop: $("#sort2").val(), category: $("#sort1").val(), sort: $("#sort").val()}, function(msg) { //表單送出
            if (msg == "noreg") {
                alert("錯誤!請稍後再試");
            } else {
                $("#productShow").html(msg);
            }
        });
    });
    $("#sort1").change(function() {
        $.post("../show/showProduct.php", { shop: $("#sort2").val(), category: $("#sort1").val(), sort: $("#sort").val()}, function(msg) { //表單送出
            if (msg == "noreg") {
                alert("錯誤!請稍後再試");
            } else {
                $("#productShow").html(msg);
            }
        });
    });
    $("#sort").change(function() {
        $.post("../show/showProduct.php", { shop: $("#sort2").val(), category: $("#sort1").val(), sort: $("#sort").val()}, function(msg) { //表單送出
            if (msg == "noreg") {
                alert("錯誤!請稍後再試");
            } else {
                $("#productShow").html(msg);
            }
        });
    });
})