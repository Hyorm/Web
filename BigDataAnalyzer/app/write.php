<?php 
  require_once("../process/authentication.php");
?>

<!DOCTYPE HTML>
<html>
  <script type="text/javascript">
    function checkForm(){
      var str = document.getElementById('field');
      var msg = document.getElementById('caution');

      if(str.value.length > 50000){
        msg.innerHTML = "Input characters must be less than 20.";
        msg.style.color = "red";
      }else{
        msg.innerHTML = "Satisfied";
        msg.style.color = "green";
      }
    }
  </script>

<head>
  <title>Write</title>
  <link rel="stylesheet" href="../css/write.css" />
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
    <div class="upper-padding"></div>
    <div id="content">
      <h2 class="page_title">Write</h2>
        <form id="article" action="../process/write_process.php" method="POST">
          <label>Title</label>
          <input type="text" name="title" required>
          <br><label>Board</label>
          <select name="board">
            <option>Free</option>
            <option>Credit</option>
          </select>
          <br><label>Content</label><span id = "caution"></span>
          <textarea name="content" onchange="checkForm()" id = "field" rows="25" required></textarea>
          <br><br>
          <div class="button-container">
            <button type="submit">write</button>
          </div>
        </form>
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
