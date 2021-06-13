$(function() {
    $().ready(() => {
        $("#contactform").validate({
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
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                subject: 'required',
                message: {
		    required: true,
		    maxlength: 300
		}
            },
            messages: {
                name: {
                    required: '必填'
                },
                email: {
                    required: '必填',
                    email: 'Email格式不正確'
                },
                phone: {
                    required: '必填',
                    minlength: '必須為10位數字',
                    maxlength: '必須為10位數字',
                    number: '電話需為數字'
                },
                subject: '必填',
                message: {
		    required: '必填',
		    maxlength: '不能超過300個字'
		}
            },
            submitHandler: function() {
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                var shop = $("#shop").val();
                if (confirm('確定送出?')) {
                    $.post("../ajax/sentContact.php", 
                    {   
                        name: name, 
                        email: email, 
                        phone: phone, 
                        subject: subject, 
                        message: message,
                        shop: shop
                    }, function(msg) { //表單送出
                        if (msg == "noreg") {
                            alert('錯誤!請重新再試!');
                        } else {
                            alert(msg);
                        }
                    });
                }
            }
        });
    });

})
