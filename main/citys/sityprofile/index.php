<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../../../assets/css/profilec.css" rel="stylesheet" type="text/css">
  </head>
 </head>
 <body>
    <?php
    $url = "syty_profile";
    include("../../../assets/bd/bd.php");
    $ses = $_SESSION['user'];
    $player_id = $ses->player_id;
    $sqlad = "SELECT * FROM $table_lp_player WHERE username ='$player_id' ";
    $resultad = $connect->query($sqlad);
if ($resultad->num_rows > 0) {
    while($rowad = $resultad->fetch_assoc()) {
      $admin = $rowad["primary_group"];
     }}

    $name = $_GET['name'];
    // if ($id!=''){
    //     $_SESSION['id'] = $id;
    //     }
    // if ($id==''){
    //     $idd=$_SESSION["id"];
    //     }

    $sqlb = "SELECT * FROM `ost` WHERE `name`='$name' ";
    $resultb = $connect->query($sqlb);
    // $sqlb = "SELECT * FROM `city` WHERE `id`='$id' ";
    // $resultb = $connect->query($sqlb);

    if ($resultb->num_rows > 0) {
     
        while($rowb = $resultb->fetch_assoc()) {
            $name = $rowb['name'];
            $icon_sity = $rowb['icon'];
            $ogorode = $rowb['ogorode'];
        $sqlc = "SELECT * FROM `city` WHERE `prez`= '1' ";
        $resultc = $connect->query($sqlc);
        $rowc = $resultc->fetch_assoc();
        $prez = $rowc['player'];              
   }}
   $sqld = "SELECT * FROM `city` WHERE `name`='$name' ";
    $resultd = $connect->query($sqld);

    if ($resultd->num_rows > 0) {
     
        while($rowb = $resultd->fetch_assoc()) {
            $players = $rowb['player'];
            $prezed = $rowb['prez'];
        $sqlcd = "SELECT * FROM `users` WHERE `nick`= '$players' ";
        $resultcd = $connect->query($sqlcd);
        $rowcd = $resultcd->fetch_assoc();
        $id = $rowcd['id'];
        $player = $rowcd['nick'];
        $id = $rowcd['id'];
        if ($prezed == '1'){
          $prezdotno = 'МЭР города';
        }else{
          $prezdotno = 'Житель города';
        }
        $html=$html.'<button onclick="document.location='."'../../players/profile?id=$id'".'" type="button" class="users"><img src="https://minotar.net/helm/'.$players.'/600.png "class="avas"> <span class="names"> '.$players.'<span class="citys"> ('.$prezdotno.')</span></span><br></button>';
        }}

    
if(isset($_SESSION['user'] ) ):
include ('../../../assets/menu/main.php');
echo('
<div class="sett1"></div>
<div class="profile">
  <br><br><div class="ava1"><img src="'.$icon_sity.'" class="ava"></div>
  <div class="nick">Название города: <br><div class="red">'.$name.'</div></div>
  <div class="syty">Мэр: <br><div class="red">'.$prez.'</div> </div>
  <div class="syty">О городе: <br><div class="red">'.$ogorode.'</div> ');

  if($unick != $adnick):
     echo('
    <button type= "button" id="b3" class="repa"  onclick="jgorod.showModal();">Жители города</button> 
    <dialog id="jgorod" class="modal">
    <header><button type= "" id="" class="button_vhod"  onclick="jgorod.close();" >&#x2716</button><h1 class="red">Жители города</h1></header>
  <div>
  '.$html.'
  </div>     
  </dialog>
       </div>');
  endif;
  
  if($tuser['player'] == 2):

endif;
    else :
    header('Location: /');
    endif;
 echo ('</body>
 </html>');
 ?>