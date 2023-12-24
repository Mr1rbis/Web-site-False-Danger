<!DOCTYPE html>
<html>
 <head>
  <title>FD | Новости</title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php $_SESSION["scale"]; ?>.css" id="scale-link"> -->
  <!-- <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/main.css" rel="stylesheet" type="text/css">

  </head>
 </head>
 <body>
 <?php
    include("bd/bd.php");
    $user = $_SESSION['user'];
    $city = $_SESSION['city'];
    $citya = $city['name'];
    // $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $nicka = $user->nick;
    $sql = "SELECT * FROM users  WHERE nick = '$nicka'";
    $result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin = $row["admin"];
   }}

   $html='';
$sqla = "SELECT * FROM news WHERE 1";
$resulta = $connect->query($sqla);

if ($resulta->num_rows > 0) {
// output data of each row
while($rowa = $resulta->fetch_assoc()) {
$info=$rowa["info"];
$name = $rowa["name"];
$autor = $rowa["autor"];

$html=$html.'<div class="user"><span class="glav"> <br>'.$name.'</span><br> <span class="name"><br>'.$info.'<br><br></span><br> </div>';
}}

if(isset($_SESSION['user'])):
 echo("<div>");
if($admin == 1):
    echo('
    <button onclick="document.location='."'moder.php'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>
    <button onclick="document.location='."'newsadd.php'".'" type="button" class="cityreg">Добавить новость</button>');
endif;
    echo('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'"type="button" class="button buttfd list" style="margin-top:202px">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
 <div class="sett"></div>');
else:
header('Location: /');
 endif;
echo $html;
?>
 </body>
 </html>