<!DOCTYPE html>
<html>
 <head>
  <title>FD | Игроки</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/playerprofile.css" rel="stylesheet" type="text/css">
  </head>
 </head>
 <body>
    <?php
    include("bd/bd.php");
    $ses = $_SESSION['user'];
    $anick = $ses['nick'];
    $sqlad = "SELECT * FROM `users` WHERE `nick`='$anick' ";
    $resultad = $connect->query($sqlad);
if ($resultad->num_rows > 0) {
    while($rowad = $resultad->fetch_assoc()) {
      $admin = $rowad["admin"];
      $adnick = $rowad["nick"];
     }}

    $id = $_POST['id'];
    $ni = $_POST['id'];
    // if ($id!=''){
    //     $_SESSION['id'] = $id;
    //     }
    // if ($id==''){
    //     $idd=$_SESSION["id"];
    //     }

    $sqlb = "SELECT * FROM `users` WHERE `id`='$id' ";
    $resultb = $connect->query($sqlb);
    // $sqlb = "SELECT * FROM `city` WHERE `id`='$id' ";
    // $resultb = $connect->query($sqlb);

    if ($resultb->num_rows > 0) {
     
        while($rowb = $resultb->fetch_assoc()) {
            $unick = $rowb['nick'];
            $devize= $rowb['devize'];
        $sqlc = "SELECT * FROM `city` WHERE `player`= '$unick' ";
        $resultc = $connect->query($sqlc);
        $rowc = $resultc->fetch_assoc();
        $ucity = $rowc['name'];
        if($ucity == ''){
            $ucitya = 'Не в городе';
        }else{
            $ucitya = $ucity;
        }
           
   }}
    
if(isset($_SESSION['user'] ) ):
 echo('<div>');
if($admin == 1):
    echo('<button onclick="document.location='."'moder.php'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
endif;
echo('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Игроки</button>
    <button onclick="document.location='."'citys.php'".'"type="button" class="button buttfd list" style="margin-top:202px">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
<div class="sett1"></div>

  <br><br><div class="ava1"><img src="https://minotar.net/helm/'.$unick.'/600.png" class="ava"></div>
  <div class="nick">Игровой ник: <br><div class="red">'.$unick.'</div></div>
  <div class="syty">Город/Поселение: <br><div class="red">'.$ucitya.'</div> </div>
  <div class="syty">О игроке: <br><div class="red">'.$devize.'</div> </div>');
  
  if($unick != $adnick):
echo('<div class="rep">
  <form action="reportcreate.php" method="post">
  <input type="hidden" name="nick" value="'.$unick.'">
  <input type="hidden" name="adnick" value="'.$adnick.'">

  <select id="ts" class="city2" name="ts">
  <option value="warzone">Зашёл на запретку</option>
  <option value="Kill">Килл без причины</option>
  <option value="prep">Препядствование нормальной игре</option>
  <option value="greaf">Гриф</option>
  <option value="cheats">Читы</option>
  </select>
  <button type="submit" id="button" class="repa" name="newadd">Отправить репорт</button>
  </form></div>');
endif;
if($tuser['player'] == 2):

  echo('<div class="vl">
        <div style="color: aqua">Ваш аккаунт заблокирован!</div>
  </div>');
endif;
 echo('<img src="../img/panel3.png" class="sett" style="left:300px; top: 100px;">');
    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>