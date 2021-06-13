$(document).ready(function(e) {
    $().ready(() => {
        $("#changePhoneForm").validate({
            rules: {
                newPhone: {
                    required: true,
                    number : true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                newPhone: {
                    required: '必填',
                    number :'不符合格式',
                    minlength: '不符合格式',
                    maxlength: '不符合格式'
                }
            },
            submitHandler: function() {
                var newPhone = $("#newPhone").val();
                $.post("../ajax/changePhone.php", { newPhone: newPhone }, function(msg) { //表單送出
                    if (msg == "success") {
                        alert('成功修改手機號碼!');
                    } else {
                        alert(msg);
                    }
                });
            }
        });
    })
});