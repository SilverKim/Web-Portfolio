<?php

$db_host = "13.209.155.134"; 
$db_user = "root"; 		
$db_passwd = "qjsgh486!";	
$db_name = "portfolio"; 
$link = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

if (mysqli_connect_errno($link)) {
	echo "Database connection failed: ".mysqli_connect_error();
}

?>
