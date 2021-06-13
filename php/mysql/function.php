<?php
/**************************
 * 資料庫登入格式化
 **************************/
class DBLogin{
    var $user;
    var $password;
    var $host;
    var $db;

    function __construct($host, $user, $password, $dbname)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
        $this->db       = $dbname;
    }

    public function the_user()
    {
        return $this->user;
    }

    public function the_pw()
    {
        return $this->password;
    }

    public function the_host()
    {
        return $this->host;
    }

    public function the_db()
    {
        return $this->db;
    }
}

/**************************
* MySQL連線
**************************/
class DBMySQL{
    //設定變數
    var $_dbConn; //連線資料
    var $_qryRes; //儲存資料
    var $_stmt;   //準備敘述

    //連線MySQL
    function __construct($hostname, $user, $password, $dbname){
        //建立連線
        $_mysql_conn = mysqli_connect($hostname,
                                    $user,
                                    $password,
                                    $dbname)
                                    or die(TXT_ERR_DB.' '.mysqli_connect_error());

        //設定UTF-8
        mysqli_set_charset($_mysql_conn, "utf8");
        date_default_timezone_set("Asia/Taipei");
        $this->_dbConn = $_mysql_conn;
        return true;
    }

    //關閉連線
    function __destruct()
    {
        mysqli_close($this->_dbConn);
    }

    //單一SQL查詢資料
    public function query($sql){
        //逃逸字元
        //$_sql = mysqli_real_escape_string($this->_dbConn, $sql);
        $_sql=$sql;
        
        //撈資料
        $qryData = mysqli_query($this->_dbConn, $_sql)
                    or die(TXT_ERR_DB.' '.mysqli_errno($this->_dbConn));

        //儲存資料後回傳
        $this->_qryRes = $qryData;
        return $qryData;
    }

    //複數SQL查詢
    public function queryMulti($sql)
    {
        //逃逸字元
        //$_sql = mysqli_real_escape_string($this->_dbConn, $sql);
        $_sql=$sql;

        //撈資料
        if(mysqli_multi_query($this->_dbConn, $_sql)){
            do {
                if($_result = mysqli_store_result($this->_dbConn)){
                    while ($_row = mysqli_fetch_all($_result, MYSQLI_ASSOC)) {
                        $this->_qryRes[] = $_row;
                    }
                    mysqli_free_result($_result);
                }
            } while (mysqli_next_result($this->_dbConn));
        }

        return $this->_qryRes;
    }

    //準備SQL
    public function stmt_prepare($sql){
        //逃逸字元
        //$_sql = mysqli_real_escape_string($this->_dbConn, $sql);
        $_sql=$sql;
        
        // Bind variables to the prepared statement as parameters  
        $stmt = mysqli_prepare($this->_dbConn, $_sql)
                    or die(TXT_ERR_DB.' '.mysqli_errno($this->_dbConn));

        //儲存資料後回傳
        $this->_stmt = $stmt;
        return $stmt;
    }
    //執行敘述
    //Attempt to execute the prepared statement
    public function stmt_execute_store(){
        $execute = mysqli_stmt_execute($this->_stmt);
        mysqli_stmt_store_result($this->_stmt);
        return $execute;
    }
    //回傳row
    //Check if result exists
    public function stmt_row(){
        return mysqli_stmt_num_rows($this->_stmt);
    }

    //回傳查詢值（全部）
    public function getAllData($type=null)
    {
        $_term  = $type;

        switch ($_term) {
        case 'MYSQLI_NUM':
            return mysqli_fetch_all($this->_qryRes, MYSQLI_NUM);
            break;

        case 'MYSQLI_ASSOC':
            return mysqli_fetch_all($this->_qryRes, MYSQLI_ASSOC);
            break;

        case 'MYSQLI_BOTH':
            return mysqli_fetch_all($this->_qryRes, MYSQLI_BOTH);
            break;

        default:
            return mysqli_fetch_all($this->_qryRes, MYSQLI_ASSOC);
            break;
        }
    }

    //回傳查詢值（逐筆）
    public function getData($type=null)
    {
        $_term  = $type;

        switch ($_term) {
        case 'MYSQLI_NUM':
            return mysqli_fetch_array($this->_qryRes, MYSQLI_NUM);
            break;

        case 'MYSQLI_ASSOC':
            return mysqli_fetch_array($this->_qryRes, MYSQLI_ASSOC);
            break;

        case 'MYSQLI_BOTH':
            return mysqli_fetch_array($this->_qryRes, MYSQLI_BOTH);
            break;

        default:
            return mysqli_fetch_array($this->_qryRes, MYSQLI_ASSOC);
            break;
        }
    }

    //回傳查詢值總數
    public function getRowsNum()
    {
        return mysqli_num_rows($this->_qryRes);
    }
}
function trim_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//發送郵件
function sendEmail($time,$email,$url,$name){
	require("../../phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // turn on SMTP authentication
	//這幾行是必須的
	
	$mail->Username = "kenWebsiteSentMail@gmail.com";
	$mail->Password = "s0661121";
	//這邊是你的gmail帳號和密碼
	$mail->CharSet = "utf-8";   
	$mail->FromName = "SMART";
	// 寄件者名稱(你自己要顯示的名稱)
	$webmaster_email = "kenWebsiteSentMail@gmail.com";
	//回覆信件至此信箱
	
	//$email="XXX@XXX.XXX";
	// 收件者信箱
	//$name="XXX";
	// 收件者的名稱or暱稱
	$mail->From = $webmaster_email;
	
	
	$mail->AddAddress($email,$name);
	$mail->AddReplyTo($webmaster_email,"Squall.f");
	//這不用改
	
	$mail->WordWrap = 50;
	//每50行斷一次行
	
	//$mail->AddAttachment("/XXX.rar");
	//附加檔案可以用這種語法(記得把上一行的//去掉)
	
	$mail->IsHTML(true); // send as HTML
	
	$mail->Subject = "SMART - 找回密碼";
	// 信件標題
	$mail->Body = "親愛的".$name."：<br/>您在".$time."提交了找回密碼請求。請點擊下面的連結重置密碼
	（按鈕24小時內有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>";
	//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)	
	if(!$mail->Send()){
		return 0;
	} else{
		return 1;
	}	
}

function debug(){
    //debug
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
function session(){
    if (!isset($_SESSION)) {
        session_start();
    }
}
?>
