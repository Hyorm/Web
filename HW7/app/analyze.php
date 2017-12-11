<?php

   require_once("../process/authentication.php");
   require_once('../process/db_connect.php');

   $id = $_SESSION['user_id'];

   ini_set('memory_limit', '-1');

   $sql = "show tables";

   $result = mysqli_query($link,$sql);

   $ifNull = 0;

  while ($row = mysqli_fetch_row($result)) {
          if ($row[0]==$id)
            $ifNull =1;
  }

  if($ifNull==0)echo"<script>alert(\"No Database\");location.href='../app/data.php'</script>";

   $sql = "SELECT COLUMN_name, COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$id."'";
   $result = mysqli_query($link,$sql);

     if(!$result){
         echo"<script>alert(\"Database Error\");history.back();</script>";
     }

?>
<!DOCTYPE HTML>
<html>
<head>

   <title>Analyze</title>
   <link rel="stylesheet" type="text/css" href="../css/analyze.css"/>

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
       <a id="up" href="../app/world.php">World</a>
       <a id="up" href="../first.html">Logout</a>
   </div>
   <div id="img">
   <br>
   <br>
   <br>
         <p class="pclass">Analyze</p>
      <p class="pclass" id="sub">Data bases from <?=$id?></p>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
   </div>

    <div id="cont1">This data consists of <br><b>"

    <?php

       while ($rowData = mysqli_fetch_row($result)) {
          echo " ".$rowData[0]."(".$rowData[1]."),";
       }

    ?>

    "<br></b> and each data can be seen through the following links.<br><br><button onclick="openWindow()">Print Data</button>
    </div>
    <br>

    <div id="analyze">

    <form name="count" action="../app/analyze.php" method="POST">
    <p id="the">Count</p>
    Data Name: <select name = "name">
        <?php
            echo "<option value=''>select</option>";
             $result = mysqli_query($link,$sql);
            while ($rowData = mysqli_fetch_row($result)) {
                echo "<option value='".$rowData[0]."'>".$rowData[0]."</option>";
             }
        ?>
    </select>
    <br>Duplicate: <input type = "radio" name="du" value="dedupYes"/>Yes
      <input type = "radio" name="du" value="dedupNo"/>No
    <br><br><input type="submit" value="click">
    </form>

    <br>
    <br>
    <?php
        if(empty($_POST['name'])||empty($_POST['du']))
          echo "<text stype='text-align: center;'>Select Data";
        else{
          if($_POST['du']=="dedupNo"){
            $que = "SELECT count(distinct ".$_POST['name'].") FROM ".$id;
            $result = mysqli_query($link,$que);
            while ($rowData = mysqli_fetch_row($result)) {
                echo "Count: ".$rowData[0];
            }
          }
          else{
            $que = "SELECT count(".$_POST['name'].") FROM kim";
            $result = mysqli_query($link,$que);
            while ($rowData = mysqli_fetch_row($result)) {
                echo "Count: ".$rowData[0];
            }
          }
        }


    ?>


	<br>
    <br>
    <p id="the">Bar Chart</p>
    <form name="graph" action="../app/analyze.php" method="POST">
      X: <select name = "row">
         <?php
            echo "<option value=''>select</option>";
             $result = mysqli_query($link,$sql);
            while ($rowData = mysqli_fetch_row($result)) {
                echo "<option value='".$rowData[0]."'>".$rowData[0]."</option>";
             }
         ?>
      </select><br>
      Duplicate: <input type = "radio" name="rowdedup" value="dedupYes"/>Yes
      <input type = "radio" name="rowdedup" value="dedupNo"/>No
      <br>Property: <input type = "radio" name="prorow" value="count"/>Count
      <input type = "radio" name="prorow" value="data"/>Data
      <br>Y: <select name = "col">
         <?php
            echo "<option value=''>select</option>";
             $result = mysqli_query($link,$sql);
            while ($rowData = mysqli_fetch_row($result)) {
                echo "<option value='".$rowData[0]."'>".$rowData[0]."</option>";
             }
         ?>
      </select><br>
      Duplicate: <input type = "radio" name="coldedup" value="dedupYes"/>Yes
      <input type = "radio" name="coldedup" value="dedupNo"/>No
      <br>Property: <input type = "radio" name="procol" value="count"/>Count
      <input type = "radio" name="procol" value="data"/>Data
      <br>
      <br><br><input type="submit" value="click">
   </form>
   </div>

   <?php

   if(empty($_POST['row'])||empty($_POST['col'])||empty($_POST['prorow'])||empty($_POST['procol'])||empty($_POST['rowdedup'])||empty($_POST['coldedup'])){
      $row = "Empty";
      $col = "Empty";
      $rowPro = "Empty";
      $colPro = "Empty";
      $rowDed = "Empty";
      $colDed = "Empty";
      $rowArr = "Empty";
      $colArr = "Empty";
      $arrNum = "Empty";
      $colNum = "Empty";
   }
   else if($_POST['row']==$_POST['col']&&$_POST['prorow']==$_POST['procol']){
      echo "<script>alert('Property Must Be Diffrent!');</script>";
      $row = "Empty";
      $col = "Empty";
      $rowPro = "Empty";
      $colPro = "Empty";
      $rowDed = "Empty";
      $colDed = "Empty";
      $rowArr = "Empty";
      $colArr = "Empty";
      $arrNum = "Empty";
      $colNum = "Empty";
   }
   else{
      $row = $_POST['row'];
      $col = $_POST['col'];
      $rowPro = $_POST['prorow'];
      $colPro = $_POST['procol'];
      $rowDed = $_POST['rowdedup'];
      $colDed = $_POST['coldedup'];

       $sql = "select ";
       if($rowPro=="count")$sql .="count(".$row."), ";
       else $sql .="".$row.", ";
       if($colPro=="count"){
          $sql .="count( ";
          if($colDed=="dedupNo")$sql .="distinct ".$col.") ";
          else $sql .= $col.") ";
       }
       else {
          $sql .= $col." ";
       }
       $sql .="from ".$id." ";
       if($rowDed=="dedupNo")$sql .="group by ".$row." ";

       $result = mysqli_query($link,$sql);

       global $rowArr;
       global $arrNum;
       global $colArr;
       global $colNum;

       $arrNum = 0;
       $colNum = 0;

       while ($rowData = mysqli_fetch_row($result)) {
          $rowArr[$arrNum] = $rowData[0];
          $colArr[$arrNum] = $rowData[1];
          if($colPro=="count")$colNum += $rowData[1];
          else {
          	if($colNum< $rowData[1])$colNum = $rowData[1];
          }
          $arrNum++;
       }

   }


   ?>

   <br>
   <div id="draw">
      <canvas id="canvas" width="800" height="520"></canvas>
      <script type="text/javascript">
         var elem = document.getElementById('canvas');
         var context = elem.getContext('2d');

         context.font = '20px sans-serif';
         context.fillStyle = '#000';
         context.lineWidth = 1;

        getRod();

         function drawLine(x1, y1, x2, y2){
            context.moveTo(x1, y1);
            context.lineTo(x2, y2);
         }

         function getRod(){
            context.clearRect(0, 0, canvas.width, canvas.height);

            var selectX = "<?=$row?>";
            var selectY = "<?=$col?>";

            if(selectX=="Empty"){
               context.fillText('No Element', 350, 100);
               context.closePath();
               context.stroke();
            }else{

               var rowArr = <?=json_encode($rowArr)?>;
               var colArr = <?=json_encode($colArr)?>;
               var arrNum = '<?=$arrNum?>';
               var colNum = '<?=$colNum?>';
               var sql = <?=json_encode($sql)?>

               context.fillText(sql, 200, 30);
               drawLine(80, 450, 80, 50);
               drawLine(80, 450, 640, 450);
               context.fillText(selectX, 650, 450);
               context.fillText(selectY, 70, 30);
               context.closePath();
               context.stroke();
               context.fillStyle= '#ab162a';
               context.lineWidth = 560/arrNum/5;
               if(560/arrNum/5<1)context.lineWidth = 1;

               context.beginPath();

               var i = 0;

               for(i = 0; i < arrNum; i++){

                drawLine(120+560/arrNum*i, 450, 120+560/arrNum*i, 400-400*colArr[i]/colNum);
               }

               context.closePath();
               context.stroke();
            }

         }
      </script>
      
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