<?php
require ('rb-mysql.php');
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$bd = "auth_test";
$table_users = "mc_auth_accounts";
$table_city = "mc_city";
$table_news = "mc_news";
$table_lp_groups = "lp_groups";
$table_lp_player = "lp_players";
// $connect = mysqli_connect("$host", "$user", "$pass", "$bd");
R::setup("mysql:host=$host; dbname=$bd", "$user", "$pass");
$connect = mysqli_connect("$host", "$user", "$pass", "$bd");

require_once('Clientinterface.php');
require_once('MinecraftClient.php');
use AlexCool\Rcon\Client\MinecraftClient;
$rhost='localhost';
$rport = 1337;                      // Port rcon is listening on
$rpassword = '1234'; // rcon.password setting set in server.properties
$rtimeout = 1;                       // How long to timeout.

$rcon = new MinecraftClient($rhost, $rport, $rpassword, $rtimeout);
// '.$tusers.'
// '.$tcity.'

session_start();