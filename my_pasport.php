<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/my_pasport.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script>
  </head>
 </head>
 <body>
    <?php
    include("bd/bd.php");
    
    $user = $_SESSION['user'];
    $sity = $_SESSION['city'];
    $nick = $user['nick'];
    $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $nickb = $tuser->nick;
    if($sity['name'] == ''){
         $syty = 'Не в городе';
    }

    if($sity['name']){
         $syty = $sity['name'];
    }
   //  $sql = "SELECT * FROM `city` WHERE `player` = '$nickb'";
   //  $result = $connect->query($sql);
   //  $row = mysql_fetch_array($result);

    
if(isset($_SESSION['user'] ) ):
 echo('<div>');
if($tuser["admin"] == 1):
    echo('<button onclick="document.location='."'moder.php'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
endif;
echo('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'"type="button" class="button buttfd list" style="margin-top:202px">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
<div class="sett1"></div>
  <br><br><div class="ava1"><img src="https://minotar.net/helm/'.$nick.'/600.png" class="ava"></div>
  <div class="nick">Игровой ник: <br><div class="red">'.$tuser['nick'].'</div></div>
  <div class="syty">Город/Поселение: <br><div class="red">'.$syty.'</div> </div>
  <div class="syty">О себе: <br><div class="red">'.$tuser['devize'].'</div> </div>');
  
if($tuser['player'] == 2):
  echo('<div class="vl">
        <div style="color: aqua">Ваш аккаунт заблокирован!</div>
  </div>');
endif;
 echo('<img src="../img/panel3.png" class="sett" style="left:300px; top: 100px;">');
    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>