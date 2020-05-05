<?php
  require_once('../process/db_connect.php');

  $id = $_POST['id'];
  $pw = $_POST['password'];

  //check id and password 
  if(!isset($id) || !isset($pw)){
        echo "<script>alert('Invalid Information');history.back();</script>";
        exit;
  }

  //make query
  $sql = "SELECT * FROM signUp WHERE id = '$id' AND password = '$pw'";
  $result = mysqli_query($link,$sql);

  if($result){
      //Login fail
      if(mysqli_num_rows($result) == 0){
   			  echo"<script>alert(\"Invalid Information\");history.back()</script>";
      }
      //Login success
      else{
           session_start(); 
			     $_SESSION['user_id'] = $id;
      }
  }
  else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  }

  mysqli_close($link);
?>
<script>location.href='../app/main.php';</script>
