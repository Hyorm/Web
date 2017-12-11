<?php
	if(!isset($_SESSION)) { 
   		session_start(); 
    } 
	if(!isset($_SESSION['user_id'])) {
		echo "<script>location.href='../first.html';</script>";
		exit;
	}
?>


