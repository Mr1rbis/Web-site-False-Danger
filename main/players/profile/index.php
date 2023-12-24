<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../../../assets/css/profile.css" rel="stylesheet" type="text/css">
  </head>
 </head>
 <body>
    <?php
    $url = "player_profile";
    include("../../../assets/bd/bd.php");
    $ses = $_SESSION['user'];
    $anick = $ses['player_name'];
    $sqlad = "SELECT * FROM $table_lp_player WHERE `username`='$anick' ";
    $resultad = $connect->query($sqlad);
if ($resultad->num_rows > 0) {
    while($rowad = $resultad->fetch_assoc()) {
      $admin = $rowad["primary_group"];
     }}

    $id = $_GET['id'];
    $ni = $_GET['id'];
    // if ($id!=''){
    //     $_SESSION['id'] = $id;
    //     }
    // if ($id==''){
    //     $idd=$_SESSION["id"];
    //     }

    $sqlb = "SELECT * FROM `$table_users` WHERE `player_id`='$id' ";
    $resultb = $connect->query($sqlb);

    if ($resultb->num_rows > 0) {
     
        while($rowb = $resultb->fetch_assoc()) {
            $unick = $rowb['player_name'];
            $uuid = $rowb['unique_id'];
   }}
   $sqlc = "SELECT * FROM `$table_lp_player` WHERE `username`='$id' ";
   $resultc = $connect->query($sqlc);

   if ($resultc->num_rows > 0) {
    
       while($rowc = $resultc->fetch_assoc()) {
           $group = $rowc['primary_group'];
  }}
if($group =='' or $group == 'default'){
  $ucitya = 'Не в группе';
}
else{
  $ucitya = $group;
}
    
if(isset($_SESSION['user'] ) ):
include ('../../../assets/menu/main.php');
echo('
<div class="sett1"></div>
<div class="profile">
  <br><br><div class="ava1"><img src="https://minotar.net/helm/'.$unick.'/600.png" class="ava"></div>
  <div class="nick">Игровой ник: <br><div class="red">'.$unick.'</div></div>
  <div class="syty">Группа: <br><div class="red">'.$ucitya.'</div> </div>
  <div class="syty">UUID: <br><div class="red">'.$uuid.'</div> ');

  // if($unick != $adnick):
     echo('
    <button type= "button" id="b3" class="repa"  onclick="report.showModal();">Репорт</button> 
    <dialog id="report" class="modal">
    <header><button type= "" id="" class="button_vhod"  onclick="report.close();" >&#x2716</button><h1 class="red">Создание репорта</h1></header>
    <form action="reportcreate.php" method="post">
    <input type="hidden" name="nick" value="'.$unick.'">
    <input type="hidden" name="adnick" value="'.$adnick.'">
    <div><input type="text" name="name" placeholder="Причина" class="text_line"><div><br><br>
    <button type="submit" id="button" class="reportbut" name="report">Отправить репорт</button>
    </form></div>
       </dialog>
       </div>');
  // else:
  //   header('Location: ../../profile');
  // endif;
    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>