$(function() {
    $("#resetContact").click(function() {
        $.post("../restaurant/contact.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
})
