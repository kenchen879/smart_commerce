$().ready(function() {        
    $("#insertForm").validate({
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
            pName: {
                required: true,                    
            },
            pUnitPrice: {
                required: true,
                number: true,
            },
            pDescription: {
                required: true,                    
                maxlength: 500
            },
            category: {
                required: true,                    
                maxlength: 20
            }
        },
        messages: {
            pName: {
                required: '必填'
            },
            pUnitPrice: {
                required: '必填',                    
                number: '必須為數字'
            },
            pDescription: {
                required: '必填',                    
                maxlength: '最大不能超過500'
            },
            category: {
                required: '必填',
                maxlength: '最大不能超過20'
            }
        },
        submitHandler: function() {
            let des = $('#pDescription').val();
            des = des.replace(/(^[\s]*)|([\s]*$)/g, "");
            des = des.replace(/\n/g, "<br>");          
            $('#pDescription').val(des);
            $.ajax({
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,			
                url: '../restaurant/ajax/newProduct.php',                        
                async: true,
                data: new FormData(document.getElementById("insertForm")),
                traditional: true,
                success: function(dat) {
                    alert(dat);
                }
            });
        }
    });
});
