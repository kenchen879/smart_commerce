<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <?php include "../../share/head.html";?>
    <script src="../../js/jquery_forget.js"></script>

</head>
<!-- <style>
     body{
        background: #4D91BB;
    } 
</style> -->


    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="../page" style="font-weight:600">
                            <img src="../../images/logo/logo.png" alt="logo" width="30%" height="10%"/>
                        </a>
                        <h2 class="text-center" style="font-weight:600">忘 記 密 碼</h2>
                        <form class="text-left clearfix">
                            <div class="form-group">
                                <input type="text" id="account" class="form-control" placeholder="帳號"><span id="chkmsg1"></span></p><br>
                                <input type="text" id="email" class="form-control" placeholder="電子郵件"><span id="chkmsg"></span></p><br>
                            </div>
                            <div class="text-center">
                                <button type="button" id="sub_btn" class="btn btn-main text-center" style="font-weight:600">送出</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Essential Scripts-->
    <?php include "../../share/script.html";?>
    <!--//Essential Scripts-->

</body>

</html>
