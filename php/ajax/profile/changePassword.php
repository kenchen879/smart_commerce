<div class='dashboard-wrapper dashboard-user-profile'>
    <div id='media'>
        <h2 class='text-center' style='font-weight: 600;'>更改密碼</h2>
        <form class='text-left clearfix' id='changePassForm' role="form">
            <div class='form-group'>
                <input type='password' name='origPassword' id='origPassword' class='form-control' placeholder='舊密碼' style='width:30%;transform: translate(380px, 30px);'>                
            </div>
            <div class='form-group'>						
                <input type='password' name='newPassword' id='newPassword' class='form-control' placeholder='新密碼' style='width:30%;transform: translate(380px, 30px);'>
            </div>
            <div class='form-group'>						
                <input type='password' name='newPasswordConfirm' id='newPasswordConfirm' class='form-control' placeholder='再次輸入' style='width:30%;transform: translate(380px, 30px);'>                
            </div><br><br>
            <div class='text-center'>					
                <button type='submit' id='changePass' class='btn btn-main text-center'>確認修改</button>
            </div>
        </form>                                
    </div>
</div>
<script src="../../js/jquery_member.js"></script>