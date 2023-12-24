<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>FD | Вход</title>
  <link href="css/auth.css" rel="stylesheet">
 </head>
 <body>
<?php
include ('bd/bd.php');
?>
<?php
$data = $_POST;
?>
<?php
if(isset($data['auth'])){
$username = $data['nick'];
$pass = $data['pass'];
$errors = array();
$user = R::findOne('users', 'nick = ?', array($data['nick']));
$city = R::findOne('city', 'player = ?', array($data['nick']));


$sql = "SELECT * FROM users  WHERE `nick` = '$username' AND `pass` = '$pass'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$usera = $row["player"];
	}

}else 
{
	$errors[] = 'Вы ввели неправильный ник или пароль';
}
if( empty($errors) ){
		$_SESSION['auth'] = true;
		$_SESSION['user'] = $user;
		$_SESSION['city'] = $city;
}else
{
	$fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
}
}
?>
<?php if(isset($_SESSION['user'] ) ): ?>
	<?php header('Location: / '); ?>
<?php else : ?> 
 <h1 class="obvod">ВХОД</h1>
	<div class="diva"><form action="/auth.php" method="post" class="app one">
        	 
	<div class="divz"><input type="text" name="nick" placeholder="Ваш ник" class="apparea"></input>

	<div class="divz"><input type="password" name="pass" placeholder="Пароль" class="apparea"></input>

	<div><button type="submit" id="button" class="button" name="auth">Войти</button></div></form>
	<button onclick="window.location.href = 'index.php';" type="button" class="exit"><--Назад</button>
<?php endif; ?>
</div>

<div>
	<?php
echo $fax
?> </div>
<body>
	
</body>
</html>