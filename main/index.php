<!DOCTYPE html>
<html>
 <head>
  <title>FD | Новости</title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php $_SESSION["scale"]; ?>.css" id="scale-link"> -->
  <!-- <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../assets/css/main.css" rel="stylesheet" type="text/css">

  </head>
 </head>
 <body>
 <?php
    include("../assets/bd/bd.php");
    $user = $_SESSION['user'];
    $player_id = $user->player_id;
    // $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
    $nicka = $user->nick;
    $sql = "SELECT * FROM $table_lp_player  WHERE username = '$player_id'";
    $result = $connect->query($sql);
    $url = "main";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $admin = $row["primary_group"];
   }}
// echo "$admin dsdsadfasf $player_id";
   $html='';
$sqla = "SELECT * FROM $table_news WHERE 1";
$resulta = $connect->query($sqla);

if ($resulta->num_rows > 0) {
// output data of each row
while($rowa = $resulta->fetch_assoc()) {
$info=$rowa["info"];
$name = $rowa["name"];
$autor = $rowa["autor"];

$html=$html.'<div class="user"><span class="glav"> <br>'.$name.'</span><br> <span class="name"><br>'.$info.'<br><br></span><br> </div>';
}}

if(isset($_SESSION['user'])):
    include ('../assets/menu/main.php');
else:
header('Location: /');
 endif;
echo $html;
?>
 </body>
 </html>