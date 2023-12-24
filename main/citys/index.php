<!DOCTYPE html>
<html>
 <head>
  <title>FD | Игроки</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../../assets/css/players.css" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/.css" id="scale-link"> -->
  <!-- <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script> -->
  </head>
 </head>
 <body>
 <?php 
    include("../../assets/bd/bd.php");
    $url = 'city';
    $user = $_SESSION['user'];
    $player_id = $user->player_id;
    // $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $nicka = $user->nick;
    $sql = "SELECT * FROM $table_lp_player WHERE username = '$player_id'";
    $result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin = $row["primary_group"];
   }}

   $html='';
$sqla = "SELECT * FROM $table_lp_groups WHERE name != 'default'";
$result = $connect->query($sqla);

// $sqlaa = "SELECT * FROM city WHERE `player` = '$nick'";
// $resulta = $connect->query($sqlaa);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$name=$row["name"];
$icon_sity = $row['icon'];

include ('../../assets/menu/main.php');

$html=$html.'<button onclick="document.location='."'./sityprofile?name=$name'".'" type="button" class="user"><img src="'.$icon_sity.'"class="ava"> <span class="name"> '.$name.'</span><br></button>';
}}
 if(isset($_SESSION['user'] ) ): 
    
 else : 
     header('Location: /'); 
endif; 
// echo ('<div class="users">
// <div>');
 echo $html ;
 echo ('</div>
</div>
 <div class="sett1"></div>
 </body>
 </html>');