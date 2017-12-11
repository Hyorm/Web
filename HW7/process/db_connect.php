<?php

$db_host = "localhost"; 
$db_user = "root"; 		//Your user name
$db_passwd = "";	//Your password
$db_name = "bda"; 
$link = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

if (mysqli_connect_errno($link)) {
	echo "Database connection failed: ".mysqli_connect_error();
}

?>

