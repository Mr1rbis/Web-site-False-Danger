<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/index.css" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf.js"></script>
  <script src="/js/style.js"></script> -->
  </head>
 </head>
 <body>
 <?php
include("./assets/bd/bd.php");
$user1 = $_COOKIE['user'];
if($user1 != ''){
   $_SESSION['auth'] = true;
   $_SESSION['user'] = $user1;
   header('Location: /main');
}
$data = $_POST;
$regerror = $data['regerror'];
$nick = $data['nick'];
$devize = $data['devize'];
$loginerror = $data['loginerror'];
?>
	<h1 class="obvod">False Danger</h1>
	<h2 class="unww mir obvod">Наш сервер как отдельный вид исскуства!)</h2>
   <?php if(isset($_SESSION['user'] ) ): ?>
    <?php header('Location: /main'); ?>
    <button type="button" id="b1" class="button one"></button>
    <button onclick="window.location.href = 'logout.php';"  class="button logout">Выход</button>

<?php else : ?> 
    
  <button type= "button" id="b2" class="button two"  onclick="register.showModal();"></button>
  <button type= "button" id="b3" class="button free"  onclick="vhod.showModal();"></button>

  <dialog id="vhod" class="modal">
    <header>
    <button type= "" id="" class="button_vhod"  onclick="vhod.close();" >&#x2716</button><h1 class="obvod">ВХОД</h1>
    </header>

    <?php echo '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center;">'.$loginerror.'</div>';?>

	<div class="diva"><form action="/auth_reg.php" method="post" class="app one">
        	 
	<div class="divz"><input type="text" name="nick" placeholder="Ваш ник" class="text_line"></input>

	<div class="divz"><input type="password" name="pass" placeholder="Пароль" class="text_line"></input>

	<div><button type="submit" id="button" class="button" name="auth">Войти</button></div></form>

  </dialog>
  <dialog id="register" class="modal">
    <header>
    <button type= "" id="" class="button_vhod"  onclick="register.close();" >&#x2716</button><h1 class="obvod">Регистрация</h1>
    </header>
    <?php echo '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center;">'.$regerror.'</div>';?>

    <div class="diva"><form action="/auth_reg.php" method="post" class="app one">

    <div class="divz"><input type="text" name="nick" placeholder="Ваш никнейм minecraft" class="text_line" value="<?php echo $nick ?>"></input></div>
 
    <div class="divz"><input type="text" name="devize" placeholder="<<О себе>> для вашего профиля" class="text_line" value="<?php echo $devize ?>" ></input></div>

    <div class="divz"><input type="password" name="pass" placeholder="Ваш пароль" class="text_line"></input>

    <div class="divz"><input type="password" name="passtwo" placeholder="Повтор пароля" class="text_line"></input>

<div><button type="submit" id="button" class="button" name="reg">Отправть</button></div></form>
  </dialog>
<?php endif; ?>

	<h3>Это наш уютный сервер по майнкрафту, где каждый игрок может создать свой "Райский островок"</br>
		Играй с друзьями, находи новые общения, строй свои города или поселения, отыгрывай RP ситуации </br>
		Вместе с другими игроками! Мы ждем тебя на нашем сервере <span style="color:#FF4500">False</span><span style="color:#00FFFF">Danger</span></h3>
    <?php if ($regerror!= '') :?>
        <script>       
        register.showModal();
        </script>
    <?php endif;?>
    <?php if ($loginerror!= '') :?>
        <script>       
        vhod.showModal();
        </script>
    <?php endif;?>
  </body>
 </html>