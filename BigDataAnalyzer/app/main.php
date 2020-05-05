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

		<a id="big" href="../app/main.php"><img src = "../img/banner.png" width="100%" height="35%"></a>

		<a href="../app/main.php"><img src = "../img/trevel.jpg" onmouseover="this.src='../img/trevel_hover.jpg'" onmouseout="this.src='../img/trevel.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/food.jpg" onmouseover="this.src='../img/food_hover.jpg'" onmouseout="this.src='../img/food.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/music.jpg" onmouseover="this.src='../img/music_hover.jpg'" onmouseout="this.src='../img/music.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/movie.jpg" onmouseover="this.src='../img/movie_hover.jpg'" onmouseout="this.src='../img/movie.jpg'"  width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/education.jpg" onmouseover="this.src='../img/education_hover.jpg'" onmouseout="this.src='../img/education.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/sport.jpg" onmouseover="this.src='../img/sport_hover.jpg'" onmouseout="this.src='../img/sport.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/dna.jpg" onmouseover="this.src='../img/dna_hover.jpg'" onmouseout="this.src='../img/dna.jpg'" width="48%" height="23%"></a>

		<a href="../app/main.php"><img src = "../img/beauty.jpg" onmouseover="this.src='../img/beauty_hover.jpg'" onmouseout="this.src='../img/beauty.jpg'"  width="48%" height="23%"></a>

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