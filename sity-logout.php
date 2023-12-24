<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
?>
<?php
$ses = $_SESSION['city'];
$usernam = $ses['player'];
$iddd = R::findOne('sity', 'id = ?', array($ses['id']));
$sesa = $_SESSION['user'];
$username = $sesa['nick'];
$sesad = $ses['name'];

$sql = "SELECT * FROM `city` WHERE `name` = '$sesad' ";
$result = $connect->query($sql);

$sqlcaa = "SELECT * FROM `city` WHERE `player` = '$username' ";
$resultcaa = $connect->query($sqlcaa);

$errors = array();
if($resultcaa->num_rows > 0){
  while($rowcaa = $resultcaa->fetch_assoc()) {
    $prez = $rowcaa["prez"];
  }
if($prez == 1){
  $errors[] = "Вы не можете выйти из города";
  header('Location: ../citys.php');
}
}

if( empty($errors) ){ 
  if($result->num_rows == 1){
    if ($rcon->connect()) {
      $rcon->sendCommand("lp user $username meta clear");
    }
    $sqlj = "DELETE FROM `ost` WHERE `name` = '$sesad' ";
    $resultj = $connect->query($sqlj);
    $sqlja = "UPDATE `city` SET `prez`='0' WHERE `nick`='$username' ";
    $connect->query($sqlja);
    $sqljaa = "UPDATE `users` SET `syty`='0' WHERE `nick`='$username' ";
    $connect->query($sqljaa);
}
if($result->num_rows > 1){
  if ($rcon->connect()) {
    $rcon->sendCommand("lp user $username meta clear");
  }
$sqlb = "UPDATE `users` SET `syty`='0' WHERE `nick`='$username'";
$connect->query($sqlb);
$sqlc = "UPDATE `city` SET `prez`='0' WHERE `nick`='$username'";
$connect->query($sqlc);
  while($rowad = $result->fetch_assoc()) {
    $user = $rowad["nick"];
   }
  $sqls = "UPDATE `city` SET `prez`='1' WHERE `nick`='$user'";
  $results = $connect->query($sqls);
}



   if ($rcon->connect()) {
    $rcon->sendCommand("lp user $username meta clear");
   }
        $log = R::dispense('log');
        $log->dei = 'Вышел из города';
        $log->name = $name;
        $log->nick = $username;
        $log->added = $username;
        R::store($log);
    $logoutst = R::load('city', $ses['id']);
    R::trash($logoutst);
    unset($_SESSION['city']);
    header('Location: ../citys.php'); 
  }




