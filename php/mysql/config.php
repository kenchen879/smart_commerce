<?php
   require_once('function.php');
   require_once('define.php');
   //設定連線
   $_login = new DBLogin(DB_MYSQL_HOST, 
   DB_MYSQL_USER, 
   DB_MYSQL_PW, 
   DB_MYSQL_DB);

   //建立連線
   $link = new DBMySQL($_login -> the_host(),
   $_login -> the_user(),
   $_login -> the_pw(),
   $_login -> the_db());
?>