<?php
    if (!isset($_SESSION)) {
		session_start();
    }
    require "../../mysql/config.php";
    $mNo = $_SESSION['id'];
    $memberSQL = "SELECT * FROM member WHERE mNo='$mNo';";
    $link->query($memberSQL);
    $memberRow = $link->getData();
    $name = $memberRow["mName"];
    $county = $memberRow["mCounty"];
    $district = $memberRow["mDistrict"];
    $street = $memberRow["mStreet"];
    $address = $county.$district.$street;
    $mail = $memberRow["mEmail"];
    $phone = $memberRow["mPhone"];
    $birthday = $memberRow["mBirthday"];    
    $image = empty($memberRow['imageName']) ? "member/happy.jpg" : $memberRow['imageName'];
    echo"
        <div class='dashboard-wrapper dashboard-user-profile'>
            <div class='media'>
                <div class='pull-left text-center' href='#'>
                    <img id='imageData' class='media-object user-img' src='../../images/$image' alt='Image'><br>
                    <span id='err'></span>              
                    <form id='uploadForm' action='../../upload.php' method='post'>
                        <label class='btn btn-main btn-tiny'>
                        <input id='upload_img' name='userImage' style='display:none;' type='file'>
                        <i class='fa fa-photo'></i> 更 改 個 人 圖 片
                        </label>                                         
                    </form> 
                </div>
                <div class='media-body'>
                    <ul class='user-profile-list'>
                        <li>
                            <span>姓名:</span>
                            <strong id='mName'>$name</strong>
                            <input id='changeName' type='text' style='display:none' placeholder='更改姓名'>
                        </li>
                        <li>
                            <span>地址:</span>
                            $address                            
                        </li>
                        <li>
                            <span>電子信箱:</span>
                            <strong id='mEmail'>$mail</strong>
                            <input id='changeMail' type='text' style='display:none' placeholder='更改電子郵件'>
                        </li>
                        <li>
                            <span>手機:</span>
                            <strong id='mPhone'>$phone</strong>
                            <input id='changePhone' type='phone' style='display:none' placeholder='更改電話號碼'>
                        </li>                        
                        <li><span>生日:</span>
                            $birthday
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        ";        
?>
<script src='../../js/jquery_member.js'></script>
<script src='../../js/jquery_changemember.js'></script>