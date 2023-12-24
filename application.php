<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Регистрация</title>
  <link href="css/application.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf.js"></script>
  <script src="/js/style.js"></script> -->
 </head>
 <body>
<?php
include ('bd/bd.php');
?>
<?php
$data = $_POST;

if(isset($data['reg'])){
$errors = array();
if ($data['nick'] == '') {
	$errors[] = "вы не ввели ник!";
}
if ($data['passtwo'] != $data['pass']) {
	$errors[] = "Введёные пароли раазличаются!";
}
if (R::count('users', "nick = ?", array($data['nick'])) >0 ) {
	$errors[] = "Такой игрок существует!";
}
// if (R::count('authme', "realname = ?", array($data['nick'])) ==0 ) {
// 	$errors[] = "Вы не зарегистрировались на сервере!";
// }
if( empty($errors) ){
	$tusers = R::dispense('users');
	$tusers->nick = $data['nick'];
	$tusers->devize = $data['devize'];
	$tusers->pass = $data['pass'];
	$tusers->player = 1;
	$tusers->admin = 0;
	$tusers->vip = 0;
	$tusers->syty = "0";
	$tusers->prez = 0;
	R::store($tusers);
	$_SESSION['auth'] = true;
	$_SESSION['user'] = $nick;
	$_SESSION['city'] = $city;
	$fax = '<div style="color:green; padding: 5px; text-align: center; ">Вашу заявку ближайшее время разсмотрят!<br>Вы можете следить за статусом заявки в ЛК ;)</div>';
}else
{
	$fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
}}
?>
 <h1 class="obvod">Регистрация</h1>
 <!-- <h3 class="apph3">Чтобы попасть на сервер, тебе нужно подать заявку.</br>
	 После рассмотрения заявки ты сможешь играть на сервере!</h3> -->
	<div class="diva"><form action="/application.php" method="post" class="app one">

	<div class="divz"><input type="text" name="nick" placeholder="Ваш никнейм minecraft" class="apparea"></input></div>
	 
	<div class="divz"><input type="text" name="devize" placeholder="<<О себе>> для вашего профиля" class="apparea"></input></div>

	<div class="divz"><input type="password" name="pass" placeholder="Ваш пароль" class="apparea"></input>

	<div class="divz"><input type="password" name="passtwo" placeholder="Повтор пароля" class="apparea"></input>
	<div><button type="submit" id="button" class="button" name="reg">Отправть</button></div>
</div>
<div>
<button onclick="window.location.href = 'index.php';" type="button" class="exit"><--Назад</button>
<?php 
	echo $fax;
?> 
</div>
</form>
<!-- 
	</div>
	<div><h5 class="pred"><span style="color:red">Внимание!</span></br> Заявки принимаются только от 12 лет!
	</br>Неадекватная заявка будет отклонена!
	</br>Если данные вводимые вами будут ложны, вы будете заблокированы!</h4></div> -->
