<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/sitys.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script>
  </head>
 </head>
 <body>

 <?php
    include("bd/bd.php");
    $user = $_SESSION['user'];
    $username = $user['nick'];
    $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $tusera = R::findOne('city', 'player = ?', array($user['nick']));

    $sqli = "SELECT * FROM sity  WHERE `player` = '$username'";
    $resulti = $connect->query($sqli);
    if ($resulti->num_rows > 0) {
        while($rowi = $resulti->fetch_assoc()) {
            $tasity = $rowi['name'];
        }}

    $html='';
    $usera = $_SESSION['city'];
    $nicka = $usera->name;
    $sql = "SELECT * FROM sity  WHERE `name` = '$tacity'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        $users = $row['player'];
        $html=$html.$nick.'<form action="cityprofile.php" method="post"><input type="hidden" name="id" value="'.$users.'"> <div class="user"> <img src="/img/city.png"class="ava"> <span class="name"> '.$users.'</span><br><input type="submit" class="usera" value=""><br></div></form>';
        }}

     if(isset($_SESSION['user'] ) ): 
   
    echo $html;

 echo ('<div>');
 if($tuser["admin"] == 1):
    echo (' <button onclick="document.location='."'moder.php'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
 endif;
    if($tuser["player"] == 1):
    if($tuser["syty"] == 0):
    echo ('<button onclick="document.location='."'cityreg.php'".'" type="button" class="cityreg">Создать город</button>');
    endif;
   endif;
//       if($tusera["prez"] == 1):
// echo ('<button onclick="document.location='."'cityadd.php'".'" type="button" class="cityreg">Добавить человека в город</button><br>    
// <button onclick="document.location='."'citydeluser.php'".'" type="button" class="cityreg">Выгнать игрока из города</button>
// <button onclick="document.location='."'citynewprez.php'".'" type="button" class="cityreg">Сменить МЭРА</button>
// </div>');

// endif;

    
    
    echo ('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'" type="button" class="button buttfd list" style="margin-top:202px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
<div class="sett"></div>');
 else : 
    header('Location: /'); 
 endif; 
echo ('</body>
 </html>');