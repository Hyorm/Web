<?php
  require_once('../process/db_connect.php');

  $id = $_POST['id'];
  $pw = $_POST['pw'];
  $name = $_POST['user_name'];
  $birth = $_POST['birth'];

  //check id and password 
  if( !isset($name) || !isset($id) || !isset($pw) || !isset($birth)){
        echo "<script>alert('Invalid Information');history.back();</script>";
        exit;
  }

  //make query
  $sql = "INSERT INTO signup VALUES ('$id', '$name', '$pw', '$birth')";
  $result = mysqli_query($link,$sql);

  if($result){
    session_start(); 
		$_SESSION['user_id'] = $id;
    echo "<script>alert(\"successfully signed up\");location.href='../app/main.php';</script>";
  }
  else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  }

  mysqli_close($link);
?>

