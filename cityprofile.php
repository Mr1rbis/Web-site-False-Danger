<!DOCTYPE html>
<html>
 <head>
  <title>FD | Игроки</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="css/cityprofile.css" rel="stylesheet" type="text/css">
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

    $sqlb = "SELECT * FROM `ost` WHERE `id`='$id' ";
    $resultb = $connect->query($sqlb);

    if ($resultb->num_rows > 0) {
     
        while($rowb = $resultb->fetch_assoc()) {
            $uname = $rowb['name'];
            $X= $rowb['x'];
            $Z= $rowb['z'];
        $sqlc = "SELECT * FROM `city` WHERE `prez`= 1 AND `name` = '$uname' ";
        $resultc = $connect->query($sqlc);
        $rowc = $resultc->fetch_assoc();
        $ucity = $rowc['player'];
        $tusera = R::findOne('city', 'player = ?', array($ses['nick']));
       

   }}
 $tuser = R::findOne('users', 'nick = ?', array($ses['nick']));
   $sqlbcc = "SELECT * FROM `city` WHERE `player`='$anick' AND `name`='$uname'";
   $resultbcc = $connect->query($sqlbcc);
if ($resultbcc->num_rows > 0) {
    
while($rowbcc = $resultbcc->fetch_assoc()) {
           $unamecc = $rowbcc['name'];
}}


if(isset($_SESSION['user'] ) ):
 echo('<div>');
if($admin == 1):
    echo('<button onclick="document.location='."'moder.php'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
endif;
echo('<button onclick="document.location='."'main.php'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'my_pasport.php'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
    <button onclick="document.location='."'players.php'".'" type="button" class="button buttfd list" style="margin-top:132px;">Игроки</button>
    <button onclick="document.location='."'citys.php'".'"type="button" class="button buttfd list" style="margin-top:202px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Города</button>
    <button onclick="document.location='."'logout.php'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
<div class="sett1"></div>
  <br><br><div class="ava1"><img src="img/city.png" class="ava"></div>
  <div class="syty1">Название города: <br><div class="red">'.$uname.'</div></div>
  <div class="syty2">Мэр: <br><div class="red">'.$ucity.'</div> </div>
  <div class="syty3">Координаты центра: <br><div class="red">X: '.$X.'<br>Z: '.$Z.' </div> </div>');

if($tusera["prez"] == 1 and $ses["nick"] == $ucity):
//   <button onclick="document.location='."'cityadd.php'".'" type="button" class="cityreg4">Добавить человека в город</button><br>    
// <button onclick="document.location='."'citydeluser.php'".'" type="button" class="cityreg">Выгнать игрока из города</button>
// <button onclick="document.location='."'citynewprez.php'".'" type="button" class="cityreg1">Сменить МЭРА</button>
echo ('
<button onclick="document.location='."'citysettings.php'".'" type="button" class="cityreg2">Управление городом</button>
</div>');
endif;
if($tuser["syty"] == 1 and $unamecc == $uname and $ses["nick"] != $ucity):
  echo('<div class="hota"><button onclick="document.location='."'sity-logout.php'".'" type="button" class="cityreg3">Выйти из города</button>');
  endif;


  echo ('<div class="rep"></div>');
 echo('<img src="../img/panel3.png" class="sett" style="left:300px; top: 100px;">');
    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>