$(function() {
    $("#sub_btn").click(function() {
        var email = $("#email").val();
        var account = $("#account").val();
        var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
        if (email == '' || !preg.test(email)) {
            $("#chkmsg").html("請填寫正確的信箱!");
        } else {
            $("#sub_btn").attr("disabled", "disabled").val('提交中..').css("cursor", "default");
            $.post("../ajax/sendmail.php", { mail: email, account: account }, function(msg) { //表單送出
                if (msg == "noreg") {
                    $("#chkmsg").html("沒有此會員!");
                    $("#sub_btn").removeAttr("disabled").val('提 交').css("cursor", "pointer");
                } else {
                    $("#chkmsg").html(msg);
                }
            });
        }
    });
})
