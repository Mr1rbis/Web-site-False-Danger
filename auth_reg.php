<!-- регистрация -->
<?php
require ('./assets/bd/bd.php');

function guidv4($data = null) {
   // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
   $data = $data ?? random_bytes(16);
   assert(strlen($data) == 16);

   // Set version to 0100
   $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
   // Set bits 6-7 to 10
   $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

   // Output the 36 character UUID.
   return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$data = $_POST;
$nick = $data['nick'];
$devize = $data['devize'];
if(isset($data['reg'])){
$errors = array();
if ($data['nick'] == '') {
	$errors[] = "вы не ввели ник!";
}
if ($data['pass'] == '') {
	$errors[] = "Вы не ввели пароль!";
}
if ($data['passtwo'] != $data['pass']) {
	$errors[] = "Введёные пароли раазличаются!";
}
// if (R::count(''.$table_users.'', "player_name = ?", array($data['nick'])) >0 ) {
// 	$errors[] = "Такой игрок существует!";
// }
// if (R::count('authme', "realname = ?", array($data['nick'])) ==0 ) {
// 	$errors[] = "Вы не зарегистрировались на сервере!";
// }
if( empty($errors) ){
   $pass = md5($data['pass']);
   $ip = $_SERVER['REMOTE_ADDR'];
   $downname = mb_strtolower($data['nick']);
   $uuid = file_get_contents('https://minecraft-api.com/api/uuid/'.$nick.'');
   if($uuid == 'Player not found !'){
      $uuid = guidv4();
   }else
{
   $uuid = substr($uuid, 0, 8)."-".substr($uuid, 8, 4)."-".substr($uuid, 12, 4)."-".substr($uuid, 16, 4)."-".substr($uuid, 20, 12);
}
echo $uuid;
   //                  f43665df 67b7 40c3 85e2 016f168b1760
   //                  f43665df-67b7-40c3-85e2-016f168b1760


   $sql112 = "INSERT INTO `mc_auth_accounts`( `player_id`, `player_id_type`, `hash_type`, `last_ip`, `unique_id`, `player_name`, `password_hash`, `last_quit`, `last_session_start`) 
   VALUES ('$downname','NAME','MD5','$ip','$uuid','$nick','$pass','0','0')";

   // $sql112 = "INSERT INTO $table_users (`player_name`, `devize`, `password_hash`, `player`, `admin`, `syty`, `prez`, `last_ip`, `hash_type`, `player_id_type`, `player_id`, `unique_id`, `last_quit`, `last_session_start`) VALUES 
   // ('$nick', '$devize', '$pass', '1', '0', '0', '0', '$ip', 'MD5', 'NAME', '$downname', 'null', '0', '0')";
   $connect->query($sql112);

	// $tusers = R::dispense($table_users);
	// $tusers->player_name = $nick;
	// $tusers->devize = $devize;
	// $tusers->password_hash = md5($data['pass']);
	// $tusers->player = 1;
	// $tusers->admin = 0;
	// $tusers->syty = "0";
	// $tusers->prez = 0;
   // $tusers->last_ip = $_SERVER['REMOTE_ADDR'];
   // $tusers->hash_type = "MD5";
   // $tusers->player_id_type = "NAME";
   // $tusers->player_id = mb_strtolower($data['nick']);
   // $tusers->unique_id = "null";
   // $tusers->last_quit = "0";
   // $tusers->last_session_start = "0";
	// R::store($tusers);


   $user = R::findOne($table_users, 'player_name = ?', array($data['nick']));
	$_SESSION['auth'] = true;
	$_SESSION['user'] = $user;
   setcookie("user", $user);
    header('Location: /main');
}else
{
	$reg = array_shift($errors);
}}
?>
<?php if($reg != '') :?>
    <form action="./" method="post">
    <input type="hidden" name="regerror" value="<?php echo $reg?>">
    <input type="hidden" name="nick" value="<?php echo $nick?>">
    <input type="hidden" name="devize" value="<?php echo $devize?>">
    <input type="submit" id="click" class="click">
    </form>
   <script>
document.getElementById("click").click(); 
</script>
<?php endif; ?>
 <!-- Авторизация -->
<?php
   if(isset($data['auth'])){
   $username = $data['nick'];
   $pass = md5($data['pass']);
   $errors = array();
   $user = R::findOne($table_users, 'player_name = ?', array($data['nick']));
   $city = R::findOne($table_city, 'player = ?', array($data['nick']));
   
   
   $sql = "SELECT * FROM $table_users  WHERE `player_name` = '$username' AND `password_hash` = '$pass'";
   $result = $connect->query($sql);
   
   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      $usera = $row["player"];
      }
   
   }else 
   {
      $errors[] = 'Вы ввели неправильный ник или пароль';
   }
   if( empty($errors) ){
         $_SESSION['auth'] = true;
         $_SESSION['user'] = $user;
         setcookie("user", $user);
         header('Location: /main');
   }else
   {
      $auth = array_shift($errors);
   }
   }
?>
<?php if($auth != '') :?>
    <form action="./" method="post">
    <input type="hidden" name="loginerror" value="<?php echo $auth?>">
    <input type="hidden" name="nick" value="<?php echo $nick?>">
    <input type="submit" id="click" class="click">
    </form>
   <script>
document.getElementById("click").click(); 
</script>
<?php endif; ?>
<!-- код --- бд
        email --- ввод кода --- сравнивание 
        if (код == ввод){
         авторизация
        }else
        {
         пошол нах
        } -->