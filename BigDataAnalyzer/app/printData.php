<?php

	require_once("../process/authentication.php");
	require_once('../process/db_connect.php');

	$id = $_SESSION['user_id'];
	ini_set('memory_limit', '-1');

  $sql = "SELECT COLUMN_name, COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$id."'";
  $result = mysqli_query($link,$sql);

 	 if(!$result){
    	  echo"<script>alert(\"Database Error\");history.back();</script>";
  	}

?>

<!DOCTYPE HTML>
<html>
<head>

	<title>Print Data</title>
	<link rel="stylesheet" type="text/css" href="../css/printData.css"/>

</head>
<body>

	<div id="content">
        <table>
          <tr>
             <?php

              while ($row = mysqli_fetch_row($result)) {
                echo "<th>".$row[0]."</th>";
              }

              global $num;

              $sql = "select count(*) FROM information_schema.columns where table_name='".$id."'";

              $result = mysqli_query($link,$sql);
              while ($row = mysqli_fetch_row($result)){
                $num = $row[0];
              }

              $sql = "SELECT * FROM ".$id."";
              $result = mysqli_query($link,$sql);

             ?>
          </tr>
          <?php
            function expandTable($id){
              $html = $id."</td><td>";

              return $html;
            }
            while ($row = mysqli_fetch_row($result)) {
              echo "<tr><td>";
              for($i = 0; $i<$num ; $i++){
              echo expandTable($row[$i]);
              }
            }            
          ?>
        </table>
   </div>

</body>
</html>
