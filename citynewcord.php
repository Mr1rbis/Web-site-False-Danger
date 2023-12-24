<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Новые координаты города</title>
  <link href="css/sityreg.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$data = $_POST;
$Zp = $data['Z'];
$Xp = $data['X'];
$user = $_SESSION['user'];
$username = $user['nick'];

$sqlb = "SELECT * FROM `city` WHERE `player`='$username' ";
$resultb = $connect->query($sqlb);

if ($resultb->num_rows > 0) {
 
    while($rowb = $resultb->fetch_assoc()) {
        $uname = $rowb['name'];
    }}

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
    $sqlc = "SELECT * FROM `city` WHERE `player`='$username' AND `prez` = '1' AND `name` = '$uname'";
$resultc = $connect->query($sqlc);

if ($resultc->num_rows != 1) {
    $errors[] = 'Вы не мэр города!';
}

$sqld = "SELECT * FROM `ost` WHERE `name`='$uname' AND `x` = '$Xp' AND `z` = '$Zp'";
$resultd = $connect->query($sqld);

if ($resultd->num_rows == 1) {
    $errors[] = 'вы указали те же координаты!';
}

// $sqlass = "SELECT * FROM `city` WHERE `name` = '$uname' AND `player` = '$username' AND `prez` = '1'";
// $resultass = $connect->query($sqlass);

// if($resultass->num_rows == 0){
//     $errors[] = 'Вы не мэр города!';
// }


if( empty($errors) ){  
        // // $sqlii = "UPDATE `city` SET `prez`='1' WHERE `player` = '$nick'";
        // $connect->query($sqlii);
        $log = R::dispense('log');
        $log->dei = 'новые корды';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $nick;
        R::store($log);

        $sqlffff = "UPDATE `ost` SET `x`='$Xp', `z`= '$Zp' WHERE `name` = '$uname'";
        $connect->query($sqlffff);

        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы сменили координаты города!</div>';
    
}else
    {
        $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
}
 echo ('<h1 class="obvod">Новые координаты города</h1>
	<div class="diva"><form action="citynewcord.php" method="post" class="app one">
    
    <input type="text" name="X" placeholder="Координата X центра города" class="apparea"></input>

    <input type="text" name="Z" placeholder="Координата Z центра города" class="apparea"></input>

	<div><button type="submit" id="button" class="city" name="newprez">Изменить</button></div>
</div>
<div>');

	echo $fax;
    // echo $xxxx;
    // echo $zzzz;

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