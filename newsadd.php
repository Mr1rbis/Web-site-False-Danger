
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Добавление новости</title>
  <link href="css/sityreg.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$ses = $_SESSION['user'];
$autor = $ses['nick'];
$_POST['nick'] = $username;
$data = $_POST;
$name = $data['name'];
$info = $data['info'];


$sql = "SELECT * FROM users  WHERE nick = '$autor'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}


 if(isset($_SESSION['user'] ) ): 

if(isset($data['newadd'])){
$errors = array();
if($name == ''){
    $errors[] = 'Вы не ввели тему новости';
}
if($info == ''){
    $errors[] = 'Вы не ввели Новость';
}

if( empty($errors) ){  
    $tusers = R::dispense('news');
    $tusers->name = $name;
    $tusers->info = $info;
    $tusers->autor = $autor;
    R::store($tusers);
    $fax = '<div style="color:green; padding: 5px; text-align: center; "> Вы опубликовали новость!</div>';
}else
{
    $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
}
}

 echo ('<h1 class="obvod">Добаление новости</h1>
	<div class="diva"><form action="newsadd.php" method="post" class="app one">

	<div class="divz"><input type="text" name="name" placeholder="Тема новости" class="apparea"></input></div>

    <div class="divz"><textarea name="info" id="1" cols="30" rows="10" class="apparea" placeholder="Новость"></textarea></input></div>

	<div><button type="submit" id="button" class="city" name="newadd">Отправть</button></div>
</div>
<div>');
	echo $fax;
 echo ('<div class="sett"></div>');
 if($admin == 1):
    echo ('<button onclick="document.location='."'moder.php'".'" type="button" class="menu buttfd list" style="margin-top:272px">Админ</button>');
 else:
    header('Location: /'); 
endif;
 echo ('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'citys.php'".'" type="button" class="button buttfd list" style="margin-top:202px;">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>');
 else : 
 header('Location: /'); 
endif; 
echo ('</body>
</html>');