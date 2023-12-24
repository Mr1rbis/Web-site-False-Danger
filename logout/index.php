<?php
require ('../assets/bd/bd.php');
if($_SESSION['auth']==true){
session_destroy();
setcookie('user', null, -1, '/');
header('Location: ../');
}
else{
header('Location: ../');   
}