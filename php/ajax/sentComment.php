<?php
    require_once "../mysql/config.php";
    session();
    $time = date('Y-m-d H:i:s', time());
    $mId = $_SESSION["id"];
    $pNo = $_POST["pNo"];
    $messages = $_POST["messages"];
    if(!isset($messages)){
        $msg = 'noreg';
        echo $msg;
        exit;	
    }else{  
        $insertCommentSQL = "INSERT INTO `board`(mNo, pNo, boardTime, board) VALUES ('$mId', '$pNo', '$time','$messages');";                            
        if(!$link->query($insertCommentSQL)){
            $msg = 'noreg';
        }
        echo $msg;
    }        
?>