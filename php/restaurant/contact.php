<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require "../mysql/config.php";
    $sId = $_SESSION['sId'];
    $contactSQL = "SELECT * FROM contact WHERE sId = $sId ORDER BY contactTime DESC;";
    $link->query($contactSQL);    
    echo"
        <div class='dashboard-wrapper user-dashboard'>
            <div class='table-responsive'>
                <table class='table'>";
                echo"
                    <button type='button' id='resetContact' style='float:right; border:3px; background:white;'>
                        <img class=draggable max128' src='../../images/icon/reset.png' style='width: 25px; height: 25px;'>
                    </button>
                ";   
    echo"
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>日期</th>
                            <th>E-mail</th>
                            <th>電話</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id='showRecord'>
";        
    			$i=0;
		    while($contactRow = $link->getData()){
		  	$i++;
			$name = $contactRow['name'];
			$phone = $contactRow['phone'];
			$email = $contactRow['email'];            
			$contactTime = $contactRow['contactTime'];
                        echo"
                            <tr>
                                <td>$name</td>
                                <td>$contactTime</td>
                                <td>$email</td>
                                <td>$phone</td>
				<td>
                                    <span data-toggle='modal' data-target='#product-modal$i'>
                                    <li class='btn btn-default'style='font-weight:500'>View</li>
                                    </span>
                                </td>
                            </tr>
                        ";
                    }
    echo"                                                
                    </tbody>
                </table>
            </div>
        </div>
";
	$j = 0;
$link->query($contactSQL);
while($contactRow = $link->getData()){
    $j++;
    echo"
            <div class='modal product-modal fade' id='product-modal$j'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <i class='tf-ion-close'></i>
                </button>
                <div class='modal-dialog ' role='document'>
                    <div class='modal-content'>
                        <div class='modal-body' style='padding:20px;'>
                            <div class='row'>
                                <div class='dashboard-wrapper user-dashboard'>
                                    <div class='table-responsive' style=''>
            ";
 					$message = $contactRow['message'];
                    $subject = $contactRow['subject'];
                    echo "<h4><strong>$subject</strong></h4><hr>";
    				nl2br($message);
					echo $message;
        echo"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	    </div>";
}
    echo "<script src='../../js/jquery_res_contact.js'></script>";
?>
