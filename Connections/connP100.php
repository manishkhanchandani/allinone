<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connP100 = "localhost";
$database_connP100 = "project100";
$username_connP100 = "root";
$password_connP100 = "";
$connP100 = mysql_pconnect($hostname_connP100, $username_connP100, $password_connP100) or trigger_error(mysql_error(),E_USER_ERROR); 
?>