<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD |Удаление жителя из города</title>
  <link href="css/sityreg.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$data = $_POST;
$nick = $data['nick'];
$user = $_SESSION['user'];
$username = $user['nick'];
$tuser = R::findOne('city', 'player = ?', array($user['nick']));
$prefix = $tuser['prefix'];
$name = $tuser['name'];

$sql = "SELECT * FROM users  WHERE nick = '$username'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}

if(isset($data['deluser'])){

$sql = "SELECT * FROM `city` WHERE `name` = '$name' AND `player` = '$nick'";
$result = $connect->query($sql);

$errors = array();

if($result->num_rows != 1){
    $errors[] = "$nick не состоит в вашем городе!";
}

if ($username == $nick){
    $errors[] = "Вы не можете кикнуть самого себя!";
}


if( empty($errors) ){  
    if ($rcon->connect()) {
        $rcon->sendCommand("lp user $nick meta clear");
    }
        $sqlii = "DELETE FROM `city` WHERE `player` = '$nick'";
        $connect->query($sqlii);
        $log = R::dispense('log');
        $log->dei = 'кикнул игрока';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $nick;
        R::store($log);

        $sql = "UPDATE `users` SET `syty`='0' WHERE `nick`='$nick'";
        $connect->query($sql);

        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы кикнули жителя '.$nick.' из города</div>';
    
}else
    {
        $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
}
 echo ('<h1 class="obvod">Кик жителя из города</h1>
	<div class="diva"><form action="citydeluser.php" method="post" class="app one">
    
    <input type="text" name="nick" placeholder="Ник того кого хотите выгнать из города!" class="apparea"></input>

	<div><button type="submit" id="button" class="city" name="deluser">Отправть</button></div>
</div>
<div>');

	echo $fax;

echo ('<div class="sett"></div>');
if($admin == 1):
   echo (' <button onclick="document.location='."'moder.php'".'" type="button" class="menu buttfd list" style="margin-top:272px">Админ</button>');
endif;
 echo ('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'" type="button" class="button buttfd list" style="margin-top:202px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</body>
</html>');