$(function() {
    $("#order").click(function() {
        $.post("order.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#history_order").click(function() {
        $.post("history_order.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#sale").click(function() {
        $.post("saleState.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#product").click(function() {
        $.post("product.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#insert").click(function() {
        $.post("insert.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#member").click(function() {
        $.post("member.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#contact").click(function() {
        $.post("contact.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
})
