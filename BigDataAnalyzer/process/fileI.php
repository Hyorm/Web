<?php 
   require_once("../process/authentication.php");
   require_once('../process/db_connect.php');
	ini_set('memory_limit', '-1');
   $id = $_SESSION['user_id'];
   $sql = "create table `bda`.`".$id."`(".$_POST['val'].")";

   $result = mysqli_query($link,$sql);
   if($result){
    			echo "<script>alert('Query Successful');</script>";
    }else{
    			echo "<script>alert('Query Fail');</script>";
    }

   $uploaddir = '../data/';
   $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
   $fileName = $_FILES['userfile']['name'];

   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    	echo "<script>alert('Upload Successful');</script>";

     	$sql = "LOAD DATA LOCAL INFILE 'C:/Bitnami/apache2/htdocs/HW7/data/".$fileName."' INTO TABLE `".$id."` FIELDS TERMINATED BY ','";
    	$result = mysqli_query($link,$sql);
    	if($result){
    			echo "<script>alert('Query Successful!');history.back()</script>";
    	}else{
    			echo "<script>alert('Query Fail!');location.href='../process/fileO.php'</script>";
    	}
   } else {
      echo "<script>alert('Upload Fail');history.back()</script>";
   }

?>