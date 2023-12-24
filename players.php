<!DOCTYPE html>
<html>
 <head>
  <title>FD | Игроки</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/players.css" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/.css" id="scale-link"> -->
  <!-- <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script> -->
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
$sqla = "SELECT * FROM users WHERE `player` = 1";
$result = $connect->query($sqla);

// $sqlaa = "SELECT * FROM city WHERE `player` = '$nick'";
// $resulta = $connect->query($sqlaa);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$nick=$row["nick"];
$id = $row['id'];
$devis = $row["devize"];
$sqlaa = "SELECT * FROM `city` WHERE `player` = '$nick'";
$resulta = $connect->query($sqlaa);
$rowa = $resulta->fetch_assoc();
$city = $rowa['name'];

if($city == ''){
   $citya = '-';
}else
{
   $citya = $city;
}
$html=$html.'<form action="playerprofile.php" method="post"><input type="hidden" name="id" value="'.$id.'"></input><div class="user"><img src="https://minotar.net/helm/'.$nick.'/600.png "class="ava"> <span class="name"> '.$nick.'<span class="city"> ('.$citya.')</span></span><br><input type="submit" class="usera" value="Посмотреть профиль игрока"></div></form>';
}}
    
 echo ('<div class="menu">');
 if($admin == 1):
    echo ('<button onclick="document.location='."'moder.php'".'" type="button" class="menu buttfd list" style="margin-top:272px">Админ</button>');
 endif;
    echo ('
    <button onclick="document.location='."'main.php'".'" type="button" class="menu buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="menu buttfd list" style="margin-top:62px">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="menu buttfd list" style="margin-top:132px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Игроки</button>
    <button onclick="document.location='."'citys.php'".'" type="button" class="menu buttfd list" style="margin-top:202px">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="menu buttfd list" style="margin-top:647px">Выйти</button>
</div>');
 if(isset($_SESSION['user'] ) ): 
 else : 
     header('Location: /'); 
endif; 
echo ('<div class="users">
<div>');
 echo $html ;
 echo ('</div>
</div>
 <div class="sett"></div>
 </body>
 </html>');