<?php
require ('rb-mysql.php');
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$bd = "test";
// $connect = mysqli_connect("$host", "$user", "$pass", "$bd");
R::setup("mysql:host=$host; dbname=$bd", "$user", "$pass");
$connect = mysqli_connect("$host", "$user", "$pass", "$bd");

use AlexCool\Rcon\Client\MinecraftClient;
$rhost='localhost';
$rport = 25575;                      // Port rcon is listening on
$rpassword = '1234'; // rcon.password setting set in server.properties
$rtimeout = 1;                       // How long to timeout.
require_once('rcon/ClientInterface.php');
require_once('rcon/MinecraftClient.php');
$rcon = new MinecraftClient($rhost, $rport, $rpassword, $rtimeout);

session_start();