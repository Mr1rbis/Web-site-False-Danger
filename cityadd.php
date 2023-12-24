
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD |Добавление жителя в город</title>
  <link href="css/sityreg.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;

if(isset($_SESSION['user'] ) ): 

$data = $_POST;
$nick = $data['nick'];
$user = $_SESSION['user'];
$nicka = $user->nick;
$username = $user['nick'];
$tuser = R::findOne('city', 'player = ?', array($user['nick']));
$prefix = $tuser['prefix'];
$name = $tuser['name'];

$sql = "SELECT * FROM users  WHERE nick = '$nicka'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}

if(isset($data['adduser'])){
$errors = array();
if (R::count('city', "player = ?", array($user['nick'])) ==0 ) {
	$errors[] = "Вы не находитесь в городе";
}
if ($data['nick'] == '') {
	$errors[] = "вы не ввели ник игрока";
}
if (R::count('city', "player = ?", array($data['nick'])) >0 ) {
	$errors[] = "Он уже состоит в городе";
}
if (R::count('users', "nick = ?", array($data['nick'])) ==0 ) {
	$errors[] = "Этот игрок не зарегистрирован на сайте";
}

if( empty($errors) ){      
        // if ($rcon->connect()) {
        //     $rcon->sendCommand("lp user $nick meta setprefix $prefix");
        // }
        $ausers = R::dispense('city');
        $ausers->player = $nick;
        $ausers->name = $name;
        $ausers->prefix = $prefix;
        $ausers->cmd = 'lp user '.$nick.' meta setprefix '.$prefix.'';
        $ausers->prez = 0;
        R::store($ausers);
        $log = R::dispense('log');
        $log->dei = 'Добавил игрока';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $nick;
        R::store($log);

        $sql = "UPDATE `users` SET `syty`='1' WHERE `nick`='$nick'";
        $connect->query($sql);

        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы добавили жителя в город</div>';
    
}else
    {
        $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
}

 echo ('<h1 class="obvod">Добавление жителя в город</h1>
	<div class="diva"><form action="cityadd.php" method="post" class="app one">
    
    <input type="text" name="nick" placeholder="Ник того кого хотите добавить в город!" class="apparea"></input>

	<div><button type="submit" id="button" class="city" name="adduser">Отправть</button></div>
</div>
<div>');

	echo $fax;

echo ('
<br><br><h3>Этот игрок должен присутствовать на сервере <span style="color:#FF4500">ОБЯЗАТЕЛЬНО!</span></br></h3> 
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
</html>')
?>