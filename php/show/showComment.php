<?php
    require "../mysql/config.php";
    session();
    $pNo = isset($_GET["pNo"]) ? $_GET["pNo"] : 1;
    $boardSQL = "SELECT * FROM board B, member M WHERE B.mNo=M.mNo AND B.pNo = $pNo ORDER BY boardTime ASC;";
	$link->query($boardSQL);
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ //noLogin
        $log = 0;
    } else {
        $log = 1;
    }
    while($boardRow = $link->getData()){
        $name = $boardRow["mName"];
        $boardTime = $boardRow["boardTime"];
        $board = $boardRow["board"];
        $image = $boardRow["imageName"];
        /** Comment Item Start **/
        echo "
        <li class='media'>
            <span class='pull-left'>            
                <img class='media-object comment-avatar' src='../../images/$image' alt='頭像' width='50' height='50' />
            </span>

            <div class='media-body'>
                <div class='comment-info'>
                    <h5 class='comment-author'>$name</h5>
                    <time>$boardTime</time>
                    <i class='tf-ion-chatbubbles'></i>
                </div>
                <p>$board</p>
            </div>
        </li>
        ";
    }            
    /** Comment Item End **/
?>