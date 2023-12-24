<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$ses = $_SESSION['user'];
$nick = $ses['nick'];
$data = $_POST;
$reason = $data['ts'];
$unick = $data['nick'];
$nick = $data['adnick'];


$sql = "SELECT * FROM users  WHERE nick = '$autor'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}


 if(isset($_SESSION['user'] ) ): 
if($nick == ''){
    header('Location: /players.php'); 
    $errors[] = 'Нету ника подающего';
}
if($unick == ''){
    header('Location: /players.php');
    $errors[] = 'Нету ника на кого подают';
}
$errors = array();
if( empty($errors) ){ 
    $tusers = R::dispense('report');
    $tusers->podayot = $nick;
    $tusers->na_kogo = $unick;
    $tusers->reason = $reason;
    R::store($tusers);
    $fax = '<div style="color:green; padding: 5px; text-align: center; "> Вы опубликовали новость!</div>';
    header('Location: /players.php'); 
}
echo $fax;
else :
 header('Location: /'); 
endif; 