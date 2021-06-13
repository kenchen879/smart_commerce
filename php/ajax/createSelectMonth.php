<?php
    require_once "../mysql/config.php";
    session();
    
    $transYear = $_POST["transYear"];
    if(!isset($transYear)){
        $msg = "noreg";
        echo $msg;
    }else{                
        $transYear = $transYear.'%';
        $transactionSQL = "SELECT DISTINCT SUBSTRING(transTime, 6, 2) AS transMonth FROM `transaction` 
                        WHERE transTime LIKE '$transYear' AND mNo='".$_SESSION['id']."' ORDER BY transTime ASC;";
        $link->query($transactionSQL);
        if($link->getRowsNum() > 0){
            echo"            
                <select id='selectMonth'>
                    <option value='%'>月份:</option>
            ";
                    while ($row = $link->getData()) {	
                        $day = $row['transMonth'];
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