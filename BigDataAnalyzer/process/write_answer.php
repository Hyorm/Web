<?php
  require_once('../process/db_connect.php');
  require_once("../process/authentication.php");

  $id = $_SESSION['user_id'];
  $content = $_POST['anwer_con'];
  $post_id =  $_POST['post_id'];
  $board =  $_POST['board'];

  //check id and password 
  if(!isset($content)){
        echo "<script>alert('Invalid Information');history.back();</script>";
        exit;
  }

  //make query
  $sql = "INSERT INTO answer (`postid`, `type`, `writer`, `text`, `time`) VALUES ('$post_id', '$board', '$id','$content', CURRENT_TIMESTAMP)";
  $result = mysqli_query($link,$sql);

  if($result){
    echo "<script>alert(\"successfully written\");location.href='../app/world.php'</script>";
  }
  else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  }

  mysqli_close($link);
?>

