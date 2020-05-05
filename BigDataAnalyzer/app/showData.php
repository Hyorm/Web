<?php

	require_once("../process/authentication.php");
	require_once('../process/db_connect.php');

	$id = $_SESSION['user_id'];

	ini_set('memory_limit', '-1');

	$sql = "SELECT count(*) FROM ".$id."";
  	$result = mysqli_query($link,$sql);

 	 if(!$result){
    	  echo"<script>alert(\"Database Error\");history.back()</script>";
  	}

?>
<!DOCTYPE HTML>
<html>
<head>

	<title>Analyze</title>
	<link rel="stylesheet" type="text/css" href="../css/data.css"/>

	<script type="text/javascript">		
	function openWindow(){
		var link = "../app/printData.php";
		var option = 'width=500, height=300';
		window.open(link, '_blank', option, true);
	}
	</script>

</head>
<body>

	<div id="nav">
      <a id="up" href="../app/main.php">Home</a>
      <a id="up" href="../app/info.php">Info</a>
      <a id="up" href="../app/data.php">Data</a>
      <a id="up" href="../app/analyze.php">Analyze</a>
      <a id="up" href="../app/World.php">World</a>
      <a id="up" href="../first.html">Logout</a>
	</div>
	<div id="img">
   <br>
   <br>
   <br>
   <p id="name">Welcome to Big Data World!</p>

   <form action="../process/fileO.php" method="post"">
      <p id = "set">File data already exist!</p>
      <br>
      <br>
      <input class="submitbtn" type="button" onclick="goAnalyze()" value = "Analyze">

      <input class="submitbtn" type="submit" value = "Delete DB">

      </form>
      <script>
      	
      	function goAnalyze(){
      		location.href='../app/analyze.php';
      	}

      </script>
      <br>
      <br>
      <br>
   </div>
   <div>
   <br>



   <br>
   <br>
      
   <br>
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