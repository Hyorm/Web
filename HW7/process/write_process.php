<?php
  require_once('../process/db_connect.php');
  require_once("../process/authentication.php");

  $id = $_SESSION['user_id'];
  $title = $_POST['title'];
  $board = $_POST['board'];
  $content = $_POST['content'];

  //check id and password 
  if(!isset($title) || !isset($board) || !isset($content)){
        echo "<script>alert('Invalid Information');history.back();</script>";
        exit;
  }

  if($board == 'Free') $board = "free";
  else if($board == 'Credit') $board = "credit";

  //make query
  $sql = "INSERT INTO ".$board." (`title`, `writer`, `text`, `time`) VALUES ('$title', '$id','$content', CURRENT_TIMESTAMP)";
  $result = mysqli_query($link,$sql);

  if($result){
    echo "<script>alert('successfully written');location.href='../app/world.php'</script>";
  }
  else{
      echo"<script>alert('Database Error');history.back()</script>";
  }

  mysqli_close($link);
?>

