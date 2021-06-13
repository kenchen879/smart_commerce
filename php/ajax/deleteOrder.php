<?php
    require_once "../mysql/config.php";
    if (!isset($_SESSION)) {
        session_start();
    }
    $tNo = $_POST["tNo"];    
    if(empty($tNo)){        
        $msg = 'noreg';
    }else{                
        $deleteOrderSQL = "DELETE FROM `record` WHERE tNo='$tNo';";
        $deleteTransactionSQL = "DELETE FROM `transaction` WHERE tNo='$tNo';";
        if ($link->query($deleteOrderSQL) && $link->query($deleteTransactionSQL)) {
            $msg = "成功";
        } else{
            $msg = "noreg";
        }
    }
    echo $msg;     
?>