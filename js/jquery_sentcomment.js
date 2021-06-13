$(function() {
    $("#boardButton").click(function() {
        $.post("../show/showComment.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#messages").keypress(function(event) {
        if (event.keyCode == 13) {
            var pNo = $("#productNumber").val();
            var messages = $("#messages").val();
            $.post("../ajax/sentComment.php", { pNo: pNo, messages: messages }, function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#messages").val("");
                    $.post("../show/showComment.php?pNo=" + pNo, function(msg) { //表單送出
                        $("#present").html(msg);
                    });
                }
            });
        }
    });
})