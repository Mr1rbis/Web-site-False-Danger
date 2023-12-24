<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../../assets/css/my_pasport.css" rel="stylesheet" type="text/css">
  </head>
 </head>
 <body>
    <?php
    $url = "profile";
    include("../../assets/bd/bd.php");
    
    $user = $_SESSION['user'];
    $player_id = $user->player_id;
    $uuid = $user->unique_id;
    // $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $nick = $user->player_name;
    $sql = "SELECT * FROM $table_lp_player  WHERE username = '$player_id'";
    $result = $connect->query($sql);
    $url = "profile";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin = $row["primary_group"];
   }}
if ($admin == 'default' or $admin == ''){
     $badmin = 'Не в группе';
}
else{
     $badmin = $admin;
}
   //  $sql = "SELECT * FROM `city` WHERE `player` = '$nickb'";
   //  $result = $connect->query($sql);
   //  $row = mysql_fetch_array($result);

    
if(isset($_SESSION['user'] ) ):
include ('../../assets/menu/main.php');
echo('
<div class="sett1"></div>
<div class="profile">
  <br><br><div class="ava1"><img src="https://minotar.net/helm/'.$nick.'/600.png" class="ava"></div>
  <button class="settings" onclick="document.location='."'./settings'".'"type="button" disabled>Настройки</button>
  <div class="nick">Игровой ник: <br><div class="red">'.$nick.'</div></div>
  <div class="syty">Группа: <br><div class="red">'.$badmin.'</div> </div>
  <div class="syty">UUID: <br><div class="red">'.$uuid.'</div> </div>
  ');

    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>