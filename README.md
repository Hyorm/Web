# Web
2017-1 Personal Project
## Summary
### Theme
Web Service project: Big Data Analyzer<br>
#### Services
- Draw Big Data Analyze Graph
- Fast Analysis
- Free Discussion
- Browser
  - Internet Explorer
  - Microsoft Edge
  - Chrome
  - Safari
  - Mobile
- Sign Up
- Input Data & Analyze Data
- Discussion other people
- AWS
- PHP, HTML, SQL
## Design
### Flow
![image](https://user-images.githubusercontent.com/28642467/104837855-c11e7880-58fa-11eb-98b2-e7eb464907d6.png)
<p align="center">Figure 1. Flow of big data analyzer</p>

#### index.html
- Top Menu
- Contents
- Creator Information
```
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome!</title>
    <link rel="stylesheet" type="text/css" href="./css/english.css">
  </head>
  <body>
    <div id="nav">
      <!--Top menu-->
    </div>
    <div>
      <!-- contents -->
    </div>
    <div id="Hyorm">
      <!-- Creator Information -->
    </div>
  </body>
</html>
```
#### App(signUp.html & write.php)
- Input User Data(.csv)
- Write Article
```
<form action="../process/register.php" method="POST">
  <div class="container">
    <!– input Data -->
  </div>
</form>
```
```
<form id="article" action="../process/write_process.php" method="POST“>
  <!– Write Article -->
</form>
```
#### App(main.php & info.php)
- Banner
- Mouseover Menu
```
<a id="big" href="../app/main.php">
  <img src = "../img/banner.png" width="100%" height="35%">
</a>
```
```
<a href="../app/main.php">
  <img src = "../img/trevel.jpg"
  onmouseover="this.src='../img/trevel_hover.jpg’”
  onmouseout="this.src='../img/trevel.jpg'" width="48%"
  height="23%">
</a>
```
#### App(data.php & showData.php)
- multipart/form-data
- textarea
- fileI/O process
```
<div id="img">
  <p id="name">Welcome to Big Data World!</p>
  <form action="../process/fileI.php" method="POST“
  enctype="multipart/form-data">
  <input class="browse" type="file" name="userfile">
</div>
<div>
  <textarea name='val' rows="10" cols="40"></textarea>
  <input class="submitbtn" type="submit" value="INPUT">
  </form>
</div>
```
#### App(analyze.php)
- Data Base information
- Count
- Bar Chart
- printData
```
$sql = "SELECT COLUMN_name, COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$id."'";
```
```
$que = "SELECT count(distinct ".$_POST['name'].") FROM ".$id;
$que = "SELECT count(".$_POST['name'].") FROM ".$id;
```
```
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
```
#### App(analyze.php: draw chart code)
```
<canvas id="canvas" width="800" height="520"></canvas>
  <script type="text/javascript">
    var elem = document.getElementById('canvas');
    var context = elem.getContext('2d');
    
    context.font = '20px sans-serif'; context.fillStyle = '#000';
    context.lineWidth = 1;

    getRod();

    function drawLine(x1, y1, x2, y2){
      context.moveTo(x1, y1); context.lineTo(x2, y2);
    }
    
    function getRod(){
      context.clearRect(0, 0, canvas.width, canvas.height);
    
      var selectX = "<?=$row?>"; var selectY = "<?=$col?>";

      if(selectX=="Empty"){
        context.fillText('No Element', 350, 100);
        context.closePath(); context.stroke();
      }else{
        var rowArr = <?=json_encode($rowArr)?>;
        var colArr = <?=json_encode($colArr)?>;
        var arrNum = '<?=$arrNum?>’; var colNum = '<?=$colNum?>';
        var sql = <?=json_encode($sql)?>
        
        context.fillText(sql, 200, 30);
        
        drawLine(80, 450, 80, 50); 
        drawLine(80, 450, 640, 450);
        
        context.fillText(selectX, 650, 450); context.fillText(selectY, 70, 30);
        context.closePath(); context.stroke();
        context.fillStyle= '#ab162a’; context.lineWidth = 560/arrNum/5;
        
        if(560/arrNum/5<1)context.lineWidth = 1;
       
        context.beginPath();

        var i = 0;

        for(i = 0; i < arrNum; i++){
          drawLine(120+560/arrNum*i, 450, 120+560/arrNum*i, 400-400*colArr[i]/colNum);
        }
        context.closePath(); context.stroke();
      }
   }
</script>
```
#### App(printData.php)
- Data Base Table
```
$sql = "select count(*) FROM information_schema.columns where table_name='".$id.“’”;
$sql = "SELECT * FROM ".$id."";
```
```
function expandTable($id){
  html = $id."</td><td>";
  return $html;
}
while ($row = mysqli_fetch_row($result)) {
  echo "<tr><td>";
  for($i = 0; $i<$num ; $i++){
    echo expandTable($row[$i]);
  }
}
```
#### process(fileI.php & fileO.php)
- multipart/form-data
- Create User Name DB
- Delete User Name DB
```
$sql = "create table `bda`.`".$id."`(".$_POST['val'].")";
$uploaddir = '../data/';
$uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
$fileName = $_FILES['userfile']['name’];
$sql = "LOAD DATA LOCAL INFILE '/var/www/html/data/".$fileName."' INTO TABLE `".$id."` FIELDS TERMINATED BY ','";
```
```
$sql = "drop table ".$id."";
```
Reference: http://php.net/manual/kr/features.file-upload.post-method.php
#### process(write_answer.php & write_process.php)
- Write Answer
- Write Article
```
if($board == 'Free') $board = "free";
else if($board == 'Credit') $board = "credit";
$sql = "INSERT INTO ".$board." (`title`, `writer`, `text`, `time`) VALUES ('$title','$id','$content', CURRENT_TIMESTAMP)";
```
```
$sql = "INSERT INTO answer (`postid`, `type`, `writer`, `text`, `time`) VALUES ('$post_id', '$board', '$id','$content', CURRENT_TIMESTAMP)";
```

### Databases
- User’s Data DB
- Signup
```
    ID: VARCHAR(100), NOT NULL, PRIMARY KEY
    NAME: VARCHAR(100), NOT NULL
    PASSWORD: VARCHAR(100), NOT NULL
    BIRTH: INT, NOT NULL
```
- Credit
```
    postId: INT, NOT NULL, AUTO_INCREMENT, PRIMARY KEY
    title: VARCHAR(100), NOT NULL
    writer: VARCHAR(100), NOT NULL
    text: VARCHAR(50000), NOT NULL
    time: FLOAT, NOT NULL
```
```
$sql = "create table `bda`.`".$id."`(".$_POST['val'].")";
```
- free
```
    postId: INT, NOT NULL, AUTO_INCREMENT, PRIMARY KEY
    title: VARCHAR(100), NOT NULL
    writer: VARCHAR(100), NOT NULL
    text: VARCHAR(50000), NOT NULL
    time: FLOAT, NOT NULL
```
- answer
```
    postId: INT, NOT NULL
    type: VARCHAR(20), NOT NULL
    writer: VARCHAR(100), NOT NULL
    text: VARCHAR(5000), NOT NULL
    time: FLOAT, NOT NULL
```
## Server Setting – AWS
- Instance
  - TYPE: t2.micro
  - Availability zone: us-west-2a
  - AMD ID: ubuntu/images/hvm-ssd/ubuntu-xenial-16.04-amd64-server-20171121.1 (ami-0def3275)
  - Inbound: 
      - HTTP – TCP(Protocol), 80(Port Range), Anywhere(Source)
      - SSH – TCP(Protocol), 22(Port Range), Anywhere(Source)
- Install
  - Apache/2.4.18 (Ubuntu)
  - PHP 7.0.22-0ubuntu0.16.04.1 (cli) (NTS)
  - MySQL 5.7.20-0ubuntu0.16.04.1 (Ubuntu)
- PHP
  - /etc/php/7.0/apache2/php.ini
  - /etc/php/7.0/cli/php.ini
- php.ini
  - upload_max_filesize
  - post_max_size
  - max_execution_time
  - max_input_time
  - memory_limit
    - (post_max_size > upload_max_filesize >= memory_limit)

## Result
- Login
![image](https://user-images.githubusercontent.com/28642467/104838946-64728c00-5901-11eb-9944-1af2a4ea2883.png)
- Sign Up
![image](https://user-images.githubusercontent.com/28642467/104839051-2c1f7d80-5902-11eb-9c20-7ecedba97aeb.png)
- Main Page
![image](https://user-images.githubusercontent.com/28642467/104839070-40637a80-5902-11eb-97c7-e38b072bc6e5.png)
- Info
![image](https://user-images.githubusercontent.com/28642467/104839087-53764a80-5902-11eb-8ebe-61c31392b8d9.png)
- Data
![image](https://user-images.githubusercontent.com/28642467/104839100-67ba4780-5902-11eb-8088-832de7e3e483.png)
- Data already exist
![image](https://user-images.githubusercontent.com/28642467/104839113-7acd1780-5902-11eb-9b16-dfd2070ed435.png)
- Analyze
![image](https://user-images.githubusercontent.com/28642467/104839128-93d5c880-5902-11eb-9e47-d615fc5fb1ee.png)
- Count
![image](https://user-images.githubusercontent.com/28642467/104839144-a6500200-5902-11eb-8adf-a837117d1ab8.png)
- Bar Chart
![image](https://user-images.githubusercontent.com/28642467/104839209-f7f88c80-5902-11eb-9013-d1206473bd28.png)
- Print Data
![image](https://user-images.githubusercontent.com/28642467/104839237-0e064d00-5903-11eb-8b13-eb893f92002a.png)
- Board(write)
![image](https://user-images.githubusercontent.com/28642467/104839249-21b1b380-5903-11eb-9db0-c7a7fde915d2.png)
- Board(Free)
![image](https://user-images.githubusercontent.com/28642467/104839259-35f5b080-5903-11eb-8fdf-e156e81aaf71.png)
- Board(Read)
![image](https://user-images.githubusercontent.com/28642467/104839268-473ebd00-5903-11eb-8632-c748f500dede.png)
- Board(Credit): Personal account
![image](https://user-images.githubusercontent.com/28642467/104839286-5d4c7d80-5903-11eb-9b63-e4e0b1864b7c.png)
- Board(Answer): easily remove
![image](https://user-images.githubusercontent.com/28642467/104839302-72291100-5903-11eb-9ea5-2ce2723abc48.png)
-TODO
  - Main
    - Change analyze background by linking with main image.
  - Data
    - Change input method.
  - Analyze
    - Added various modeling to data analysis.
    - Resolving bin count errors on graph
  - World
    - Modified to be able to upload images for better discussion.
