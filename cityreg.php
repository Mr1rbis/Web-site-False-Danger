
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Создание города</title>
  <link href="css/sityreg.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$ses = $_SESSION['user'];
$username = $ses['nick'];
$_POST['nick'] = $username;
$data = $_POST;
$name = $data['name'];
$prefix = $data['prefix'];
$permission = 'city.'.$name.'';
$nick = $data['nick'];
$X = $data['X'];
$Z = $data['Z'];

$sql = "SELECT * FROM users  WHERE nick = '$username'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}


 if(isset($_SESSION['user'] ) ): 
if(isset($data['create-city'])){
$errors = array();
if ($data['name'] == '') {
	$errors[] = "вы не ввели название города";
}
if ($data['prefix'] == '') {
	$errors[] = "вы не ввели префикс города";
}
if ($data['X'] == '') {
	$errors[] = "вы не ввели координату X города";
}
if ($data['Z'] == '') {
	$errors[] = "вы не ввели координату Z города";
}
if (R::count('city', "name = ?", array($data['name'])) >0 ) {
	$errors[] = "Такой город существует!";
}
if (R::count('city', "player = ?", array($data['nick'])) >0 ) {
	$errors[] = "Вы уже стостоите в городе";
}
$sqld = "SELECT * FROM `ost` WHERE `x` = '$X' AND `z` = '$Z'";
$resultd = $connect->query($sqld);

if ($resultd->num_rows == 1) {
    $errors[] = 'Вы указали координаты другого города';
}
if( empty($errors) ){  
        // if ($rcon->connect()) {
        //     $rcon->sendCommand("lp user $username meta setprefix &b[$prefix]&r");
        $tusers = R::dispense('city');
        $tusers->player = $username;
        $tusers->name = $name;
        $tusers->prefix = '&b['.$prefix.']&r';
        $tusers->cmd = 'lp user '.$username.' meta setprefix &b['.$prefix.']&r';
        $tusers->prez = 1;
        R::store($tusers);
        $log = R::dispense('log');
        $log->dei = 'Создал';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $username;
        R::store($log);
        $ost = R::dispense('ost');
        $ost->name = $name;
        $ost->x = $X;
        $ost->z = $Z;
        R::store($ost);
        $city = R::findOne('city', 'player = ?', array($data['nick']));
        $_SESSION['city'] = $city;

        $sql = "UPDATE `users` SET `syty`='1' WHERE `nick`='$username'";
        $connect->query($sql);

        $fax = '<div style="color:green; padding: 5px; text-align: center; "> Вы создали город и вступили в него как Презедент</div>';
    }}else
    {    
        $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
// }

 echo ('<h1 class="obvod">Регистрация поселения</h1>
	<div class="diva"><form action="cityreg.php" method="post" class="app one">

	<div class="divz"><input type="text" name="name" placeholder="Название города" class="apparea"></input></div>

    <div class="divz"><input type="text" name="prefix" placeholder="Название в табе (БЕЗ ЦВЕТОВ И СКОБОК!)" class="apparea"></input></div>

    <div class="divz"><input type="text" name="X" placeholder="Координата X центра города" class="apparea"></input></div>

    <div class="divz"><input type="text" name="Z" placeholder="Координата Z центра города" class="apparea"></input></div>

	<div><button type="submit" id="button" class="city" name="create-city">Отправть</button></div>
    
</div>
<div>');

	echo $fax;

echo ('<br><br><h3>Вы должны присутствовать на сервере <span style="color:#FF4500">ОБЯЗАТЕЛЬНО!</span></br></h3> 
 <div class="sett"></div>');
 if($admin == 1):
   echo ('<button onclick="document.location='."'moder.php'".'" type="button" class="menu buttfd list" style="margin-top:272px">Админ</button>');
 endif;
 echo ('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'" type="button" class="button buttfd list" style="margin-top:202px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>');
 else :  
 header('Location: /'); 
 endif; 
echo ('</body>
</html>');