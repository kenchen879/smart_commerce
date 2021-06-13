<?php
include "../mysql/config.php";//连接数据库
$email = trim_input($_POST['mail']);
$account = trim_input($_POST['account']);
$sql = "SELECT mName FROM member WHERE mAccount = ? AND mEmail = ?";
if($link->stmt_prepare($sql)){
	mysqli_stmt_bind_param($link->_stmt, "ss", $account, $email);
	if($link->stmt_execute_store()){
		$num = $link->stmt_row();
		if($num == 0){	//該郵件未註冊
			$msg = 'noreg';
		}else{
            mysqli_stmt_bind_result($link->_stmt, $username);
            if (mysqli_stmt_fetch($link->_stmt)) {
                $getpasstime = time();
                $token = md5($account.$username);//組合驗證碼
            	$url = "http://123.195.84.187//smart/php/member/reset.php?email=".$email."&token=".$token;//建構url
            	$time = date('Y-m-d H:i');
            	$result = sendEmail($time, $email, $url, $username);
            	if ($result==1) {//郵件發送成功
                    $msg = '系統已向您的郵箱發送了一封郵件<br/>請登入到您的郵箱及時重置您的密碼！';
                    //更新郵件發送時間
                    $link->query("UPDATE member SET getpasstime='$getpasstime' WHERE mAccount='$account'");
                } else {
                    $msg = "郵件發送錯誤!稍後再試!";
                }
            } else {
                $msg = "沒有此電子信箱";
            }            
        }
	} else{
		$msg = "發生錯誤!請稍後再試";	
	}	
} else{
	$msg = "發生錯誤!請稍後再試";
}
echo $msg;
?>
