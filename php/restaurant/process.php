<?php
    require_once "../mysql/config.php";
    if(!isset($_SESSION))
        session_start();        
    $process = $_POST["process"];
    $tNo = $_POST["tNo"];
    $changeProcessSQL = "UPDATE `transaction` SET process='$process' WHERE tNo='$tNo';";
    if(!$link->query($changeProcessSQL)){        
        $msg = 'noreg';        
    }else{
        $msg = '成功';
    }
    echo $msg;      
?>