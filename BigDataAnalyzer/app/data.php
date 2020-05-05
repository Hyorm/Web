<?php 
   require_once("../process/authentication.php");
   require_once('../process/db_connect.php');

   $id = $_SESSION['user_id'];

   $sql = "show tables";
   $result = mysqli_query($link,$sql);

	while($row = mysqli_fetch_row($result)){
		if($row[0]==$id){
			echo "<script>location.href='../app/showData.php'</script>";
		}
	}
?>

<!DOCTYPE HTML>
<html>
<head>

   <title>Data</title>
   <link rel="stylesheet" type="text/css" href="../css/data.css"/>
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
   <div id="img">
   <br>
   <br>
   <br>
   <p id="name">Welcome to Big Data World!</p>

   <form action="../process/fileI.php" method="post" enctype="multipart/form-data">
      <br>
      <br>
      <input class="browse" type="file" name="userfile">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
   </div>
   <div>
   <br>
   <textarea name='val' rows="10" cols="40"></textarea> 
   <br>
   <br>
    <input class="submitbtn" type="submit" value="INPUT">
      </form>
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