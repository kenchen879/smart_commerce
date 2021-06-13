$(function() {
    var totalI = $("#countI").val();
    for (let i = 1; i <= totalI; i++) {
        $("#process" + i).change(() => {
            var process = $("input[name='process" + i + "']:checked").val();
            if (confirm("確定更改?")) {
                $.post("process.php", { process: process, tNo: i }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
            }
        });
    }
    $("#resetOrder").click(function() {
        $.post("../restaurant/order.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
})