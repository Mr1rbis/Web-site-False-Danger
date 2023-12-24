<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/index.css" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf.js"></script>
  <script src="/js/style.js"></script> -->
  </head>
 </head>
 <body>
 <?php
include("bd/bd.php")
?>
	<h1 class="obvod">False Danger</h1>
	<h2 class="unww mir obvod">Наш сервер как отдельный вид исскуства!)</h2>
   <?php if(isset($_SESSION['user'] ) ): ?>
    <?php header('Location: /main.php'); ?>
    <button type="button" id="b1" class="button one"></button>
    <button onclick="window.location.href = 'logout.php';"  class="button logout">Выход</button>

<?php else : ?> 
  <button type= "button" id="b2" class="button two"  onclick="window.location.href = 'application.php';"></button>
  <button type= "button" id="b3" class="button free"  onclick="window.location.href = 'auth.php';"></button>
<?php endif; ?>

	<h3>Это наш уютный сервер по майнкрафту, где каждый игрок может создать свой "Райский островок"</br>
		Играй с друзьями, находи новые общения, строй свои города или поселения, отыгрывай RP ситуации </br>
		Вместе с другими игроками! Мы ждем тебя на нашем сервере <span style="color:#FF4500">False</span><span style="color:#00FFFF">Danger</span></h3>


  </body>
 </html>