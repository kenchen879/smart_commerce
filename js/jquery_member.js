$(document).ready(function() {
    $('#uploadForm').on('change', (function(e) {
        e.preventDefault();
        $.ajax({
            url: '../ajax/upload.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#imageData').attr('src', '../../images/' + data);
            },
            error: function() {}
        });
    }));
    
    $().ready(() => {
        $("#changePassForm").validate({
            /* 常用檢測屬性
           required:必填
           noSpace:空白
           minlength:最小長度
           maxlength:最大長度
           email:信箱格式
           number:數字格式
           url:網址格式https://www.xxx.com
           */
            rules: {
                origPassword: {
                    required: true
                },
                newPassword: {
                    required: true,
                    minlength: 4,
                    maxlength: 20
                },
                newPasswordConfirm: {
                    required: true,
                    minlength: 4,
                    maxlength: 20
                }
            },
            messages: {
                origPassword: {
                    required: '必填'
                },
                newPassword: {
                    required: '必填',
                    minlength: '至少要4個字',
                    maxlength: '最大不能超過20',
                },
                newPasswordConfirm: {
                    required: '必填',
                    minlength: '至少要4個字',
                    maxlength: '最大不能超過20'
                }
            },
            submitHandler: function() {
                var origPassword = $("#origPassword").val();
                var newPassword = $("#newPassword").val();
                var newPasswordConfirm = $("#newPasswordConfirm").val();
                $.post("../ajax/changePassword.php", { origPassword: origPassword, newPassword: newPassword, newPasswordConfirm: newPasswordConfirm }, function(msg) { //表單送出
                    if (msg == "success") {
                        alert('成功修改密碼!請重新登入!');
                        window.location.href = "../member/logout.php";
                    } else {
                        alert(msg);
                    }
                });
            }
        });
    })
});
