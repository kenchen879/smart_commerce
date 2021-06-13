<?php
    require_once "../mysql/config.php";
    session();
    
    $transMonth = isset($_POST["transMonth"]) ? $_POST["transMonth"] : "%";
    $transYear = isset($_POST["transYear"]) ? $_POST["transYear"] : "%";
    if(!isset($transMonth) && !isset($transYear)){
        $msg = "noreg";
        echo $msg;
    }else{
        $transDate = $transYear."-".$transMonth.'%';
        $transactionSQL = "SELECT DISTINCT SUBSTRING(transTime, 9, 2) AS transDate FROM `transaction` 
                        WHERE transTime LIKE '$transDate' AND mNo='".$_SESSION['id']."' ORDER BY transDate ASC;";
        $link->query($transactionSQL);
        if($link->getRowsNum() > 0){
            echo"            
                <select id='selectDay'>
                    <option value='%'>日期:</option>
            ";
                    while ($row = $link->getData()) {	
                        $day = $row['transDate'];
                        echo "<option value='$day'>$day</option>";
                    }
            echo "
                </select>
            ";
        } else {
            echo "noreg";
        }
    }        
?>