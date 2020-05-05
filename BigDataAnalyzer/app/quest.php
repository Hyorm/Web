<?php 
  require_once("../process/authentication.php");
  require_once('../process/db_connect.php');

  $id = $_SESSION['user_id'];

  //make query
  $sql = "SELECT * FROM credit";
  $result = mysqli_query($link,$sql);

  if(!$result){
      echo"<script>alert(\"Database Error\");history.back();</script>";
  }
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Market</title>
  <link rel="stylesheet" type="text/css" href="../css/world.css" />
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
    <div id="big">
        <a id="name" href="../app/world.php">Free</a>
        <a id="name" href="../app/quest.php">Credit</a>
        <br><p id="co">You can choose one!</p>
    </div>
    <div id="content">
        <table>
          <tr>
            <th>post id</th><th>title</th><th>writer</th><th>time</th>
          </tr>
          <?php
            function expandTable($post_id,$title,$writer, $time){
              $html = "<tr><td>";
              $html .= $post_id."</td><td class='title'><a href ='../app/read.php?post_id=".$post_id."&board=credit'>";
              $html .= $title."</td></a><td>";
              $html .= $writer."</td><td>";
              $html .= $time."</td></tr>";

              return $html;
            }
            $sql = "SELECT * FROM credit where writer='".$id."'";
            if($id=="root")$sql = "SELECT * FROM credit";
            $result = mysqli_query($link,$sql);


            while ($row = mysqli_fetch_row($result)) {
              echo expandTable($row[0],$row[1],$row[2],$row[4]);
            }            
          ?>
        </table>
        <div>
          <a href="../app/write.php"><button>write</button></a>
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
