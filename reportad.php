<?php
include ('bd/bd.php');
use AlexCool\Rcon\Client\MinecraftClient;
$ses = $_SESSION['user'];
$nick = $ses['nick'];
$data = $_POST;
$id = $data['id'];
$plus = $data['plus'];
$minus = $data['minus'];


$sqlb = "SELECT * FROM `report` WHERE `id`='$id' ";
$resultb = $connect->query($sqlb);

if ($resultb->num_rows > 0) {
     
    while($rowb = $resultb->fetch_assoc()) {
        $pnick = $rowb['podayot'];
        $nnick = $rowb['na_kogo'];
        $reason = $rowb['reason'];
}}

$sql = "SELECT * FROM users  WHERE nick = '$nick'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["admin"];
}}
if($admin != 1) :
    header('Location: /'); 
   endif; 
   if(isset($data['plus'])){
    echo ('
    <form action="moder.php" method="post">
    <input type="hidden" name="usernick" value="'.$nnick.'">
    <input type="submit" id="click" class="click">
    </form>
   <script>
document.getElementById("click").click();
   </script>
    ');
   };
   if(isset($data['minus'])){
    $sqlc = "DELETE FROM `report` WHERE `id`='$id' ";
    $resultc = $connect->query($sqlc);
    header('Location: /moder.php'); 
   };
echo $fax;