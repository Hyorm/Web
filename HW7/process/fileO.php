<?php 
   require_once("../process/authentication.php");
   require_once('../process/db_connect.php');
	ini_set('memory_limit', '-1');
   $id = $_SESSION['user_id'];
   $sql = "drop table ".$id."";

   $result = mysqli_query($link,$sql);
   if($result){
    			echo "<script>alert('Query Successful');location.href='../app/data.php'</script>";
    }else{
    			echo "<script>alert('Query Fail');location.href='../app/showData.php'</script>";
    }
?>