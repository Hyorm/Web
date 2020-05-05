<?php 
  require_once("../process/authentication.php");
  require_once('../process/db_connect.php');

  $user_id =  $_SESSION['user_id'];
  $post_id =  $_GET['post_id'];
  $board = $_GET['board'];

  //make query
  $sql = "SELECT * FROM $board WHERE postId = ".$post_id;
  $result = mysqli_query($link,$sql);

  if(!$result){
      echo"<script>alert(\"Post Does Not Exist\");history.back()</script>";
  }

  $data = mysqli_fetch_row($result);
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="../css/world.css" />
</head>

<body>
     <div id="nav">
       <a id="up" href="../app/main.php">Home</a>
       <a id="up" href="../app/info.php">Info</a>
       <a id="up" href="../app/data.php">Data</a>
       <a id="up" href="../app/analyze.php">Analyze</a>
       <a id="up" href="../app/world.php">World</a>
       <a id="up" href="../first.html">Logout</a>
    </div>
    <div id="content">
      <h2 class="page_title"><?php echo $data[1];?></h2>
        <div id="article">
          <div id="post">
            <?php echo $data[3];?>
          </div>
          
          <?php

          //check the writer and make remove button
          if($user_id == $data[2]){

            if(array_key_exists('remove',$_POST)){
                //make query
                $sql = "DELETE FROM $board WHERE postId = $post_id";
                $result = mysqli_query($link,$sql);

                if(!$result){
                  echo"<script>alert(\"Database Error\");history.back();</script>";
                }
                else{
                  echo"<script>alert(\"Successfully removed\");";
                  echo "location.href='../app/world.php';</script>";
                }
            }
            echo "<form method='POST'>";
            echo "<div class='button-container'>";
            echo "<button name='remove'>Remove</button></div></form>";          

          }

          ?>

    </div>
    <div id="answer">
    <table>
          <tr>
            <th>time</th><th>writer</th><th>text</th><th>delete</th>
          </tr>
    <?php

      $sql = "SELECT * FROM answer WHERE postId = '$post_id' AND type = '$board'";
      $result = mysqli_query($link,$sql);

      if(!$result){
        echo "Answer Does Not Exist";
      }else
      {
        echo "<br>";

        function expandTable($writer, $time, $text){
              $html = "<tr><td>";
              $html .= $time."   "."</td></a><td>";
              $html .= $writer."   "."</td><td>";
              $html .= $text."   "."</td>";
              return $html;
            }
            $i = 0;
            while ($row = mysqli_fetch_row($result)) {
              echo expandTable($row[2],$row[4],$row[3]);
            if($user_id == $row[2]){
            
            if(array_key_exists('delete',$_POST)){
                //make query
                $sql = "DELETE FROM answer WHERE writer='$user_id'AND type='$board'";
                $result = mysqli_query($link,$sql);

                if(!$result){
                  echo"<script>alert(\"Database Error\");history.back();</script>";
                }
                else{
                  echo"<script>alert(\"Successfully removed\");";
                  echo "location.href='../app/world.php';</script>";
                }
              }
            echo "<form method='POST'>";
            echo "<td><button name='delete'>delete</button></td></tr></form>";
            echo "</table>";    
            echo "<table>"; 

              }
              else{
                echo "</tr>";
              }
            }
            echo "</table>";
      }

    ?>
    <form id="answer" action='../process/write_answer.php' method="POST">
          <textarea name="anwer_con"></textarea>
          <div class="button-container">
          <input type ="hidden" value="<?php echo $post_id;?>" name = "post_id">
          <input type ="hidden" value="<?php echo $board;?>" name = "board">
          <button type="submit">submit</button>
          </div>
    </form>
    </div>
  </div>
  <div id="Hyorm">
  <pre>
  <b>H</b>
  <b>Y</b>
  <b>O</b>
  <b>R</b>
  <b>M</b>
  e-mail: 21600193@handong.edu
  Computer Science.CSEE.HGU
  558, Handong-ro, Heunghae-eup, Buk-gu, Pohang-si
  Gyeongsangbuk-do, Republic of Korea
  </div>
</body>
</html>
