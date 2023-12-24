<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Новый мэр</title>
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

if(isset($data['newprez'])){

$sql = "SELECT * FROM `city` WHERE `name` = '$name' AND `player` = '$nick'";
$result = $connect->query($sql);

$errors = array();
$sqls = "SELECT * FROM `city` WHERE `name` = '$name' AND `player` = '$username' AND `prez` = '1'";
$results = $connect->query($sqls);
if($results->num_rows != 1){
    $errors[] = "Вы не мэр города!";
}
if($result->num_rows != 1){
    $errors[] = "$nick не состоит в вашем городе!";
}

if ($username == $nick){
    $errors[] = "Вы не можете сделать мэром самого себя!";
}

if( empty($errors) ){  
        // // $sqlii = "UPDATE `city` SET `prez`='1' WHERE `player` = '$nick'";
        // $connect->query($sqlii);
        $log = R::dispense('log');
        $log->dei = 'новый презедент';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $nick;
        R::store($log);

        $sql = "UPDATE `city` SET `prez`='1' WHERE `player` = '$nick'";
        $connect->query($sql);
        $sqlaaa = "UPDATE `city` SET `prez`='0' WHERE `player` = '$username'";
        $connect->query($sqlaaa);

        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы отдали права владения городом '.$nick.'</div>';
    
}else
    {
        $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
}
 echo ('<h1 class="obvod">Выбор нового мэра</h1>
	<div class="diva"><form action="citynewprez.php" method="post" class="app one">
    
    <input type="text" name="nick" placeholder="Ник того кого хотите поставить на пост мэра!" class="apparea"></input>

	<div><button type="submit" id="button" class="city" name="newprez">Отправть</button></div>
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