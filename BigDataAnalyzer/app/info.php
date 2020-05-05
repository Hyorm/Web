<?php 
	require_once("../process/authentication.php");
	require_once('../process/db_connect.php');

	$id = $_SESSION['user_id'];
?>

<!DOCTYPE HTML>
<html>
<head>

	<title>Main</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
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
	<img src = "../img/D.png" onmouseover="this.src='../img/D_hover.png'" onmouseout="this.src='../img/D.png'" width="40%" height="40%">
	<img src = "../img/A.png" onmouseover="this.src='../img/A_hover.png'" onmouseout="this.src='../img/A.png'" width="40%" height="40%">
	<img src = "../img/T.png" onmouseover="this.src='../img/T_hover.png'" onmouseout="this.src='../img/T.png'" width="40%" height="40%">
	<img src = "../img/A2.png" onmouseover="this.src='../img/A2_hover.png'" onmouseout="this.src='../img/A2.png'" width="40%" height="40%">
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
	</pre>
	</div>
</body>
</html>