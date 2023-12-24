<!DOCTYPE html>
<html>
 <head>
  <title>FD | Главная</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="../../assets/css/admin.css" rel="stylesheet" type="text/css">
  <?php
  ?>
  <!-- <link rel="stylesheet" type="text/css" href="css/adaptive/<?php echo $_SESSION["scale"]; ?>.css" id="scale-link">
  <script src="/js/autoconf-main.js"></script>
  <script src="/js/style-main.js"></script> -->
  </head>
 </head>
 <body>
 <?php
include("../../assets/bd/bd.php");
// include("js/auto.js");
$url = 'admin';

$user = $_SESSION['user'];
// $tuser = R::findOne('users', 'nick = ?', array($user['nick']));
$nicka = $user->player_id;
$sql = "SELECT * FROM $table_lp_player  WHERE username = '$nicka'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$admin = $row["primary_group"];
        $data = $_POST;
        $nick = $data['nick'];
        $ab = $data['ab'];
        $ts = $data['ts'];
        $time = $data['time'];
        $usernick = $data['usernick'];
        if($usernick == ''){
            $uuunick = '';
        }else
        {
            $uuunick = $usernick;
        }
}}

        if(isset($data['vid'])){

            $errors = array();
            
            if ($data['nick'] == '') {
                $errors[] = "Вы не ввели ник игрока";
            }
            // if (R::count('authme', "realname = ?", array($data['nick'])) ==0 ) {
            //     $errors[] = "Этот игрок не зарегистрирован на сервере";
            // }
            if ($nick == $nicka){
                $errors[] = "Вы не можете забанить/замутить/замутить ГЧ/кикнуть самого себя!";
            }
            
            if( empty($errors) ){  
                if($ab == 'ban'){
                    if($ts == 'min'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы забанили '.$nick.' на '.$time.' минут</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$time.'m');
                    }}
                    if($ts == 'hour'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы забанили '.$nick.' на '.$time.' часов</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$time.'h');
                    }}
                    if($ts == 'day'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы заблокировали '.$nick.' на '.$time.' дней</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$time.'d');
                    }}
                    if($ts == 'week'){
                        $week = $time * 7;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы заблокировали '.$nick.' на '.$time.' недель</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$week.'d');
                    }}
                    if($ts == 'month'){
                        $month = $time * 30;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы заблокировали '.$nick.' на '.$time.' месяцев</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$month.'d');
                    }}
                    if($ts == 'year'){
                        $year = $time * 30 * 12;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы заблокировали '.$nick.' на '.$time.' лет</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempban '.$nick.' '.$year.'d');
                    }}
                    if($ts == 'perm'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы заблокировали '.$nick.' навсегда</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('ban '.$nick.'');
                    }}
                }
                if($ab == 'mute'){
                    if($ts == 'min'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' минут</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$time.'m');
                    }}
                    if($ts == 'hour'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' часов</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$time.'h');
                    }}
                    if($ts == 'day'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' дней</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$time.'d');
                    }}
                    if($ts == 'week'){
                        $week = $time * 7;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' недель</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$week.'d');
                    }}
                    if($ts == 'month'){
                        $month = $time * 30;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' месяцев</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$month.'d');
                    }}
                    if($ts == 'year'){
                        $year = $time * 30 * 12;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' на '.$time.' лет</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('tempmute '.$nick.' '.$year.'d');
                    }}
                    if($ts == 'perm'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили '.$nick.' навсегда</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('mute '.$nick.'');
                    }}
                }
                if($ab == 'vmute'){
                    if($ts == 'min'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' минут</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$time.'m');
                    }}
                    if($ts == 'hour'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' часов</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$time.'h');
                    }}
                    if($ts == 'day'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' дней</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$time.'d');
                    }}
                    if($ts == 'week'){
                        $week = $time * 7;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' недель</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$week.'d');
                    }}
                    if($ts == 'month'){
                        $month = $time * 30;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' месяцев</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$month.'d');
                    }}
                    if($ts == 'year'){
                        $year = $time * 30 * 12;
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' на '.$time.' лет</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.' '.$year.'d');
                    }}
                    if($ts == 'perm'){
                        $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы замутили ГЧ '.$nick.' навсегда</div>';
                        if ($rcon->connect()) {
                            $rcon->sendCommand('vmute '.$nick.'');
                    }}
                }
                if($ab == 'kick'){
                    $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы кикнули '.$nick.'</div>';
                    if ($rcon->connect()) {
                        $rcon->sendCommand('kick '.$nick.'');
                }
            }
            if($ab == 'unmute'){
                $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы размутили '.$nick.'</div>';
                if ($rcon->connect()) {
                    $rcon->sendCommand('unmute '.$nick.'');
            }
        }
            if($ab == 'vunmute'){
                $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы размутили ГЧ '.$nick.'</div>';
                if ($rcon->connect()) {
                    $rcon->sendCommand('vunmute '.$nick.'');
            }
        }
            if($ab == 'unban'){
                $fax = '<div style="color:green; padding: 5px; text-align: center; ">Вы разбанили '.$nick.'</div>';
                if ($rcon->connect()) {
                    $rcon->sendCommand('unban '.$nick.'');
            }
        }
                
            
    }else
    {
    $fax = '<div style="color:rgba(255, 91, 91, 0.808); padding: 5px; text-align: center; ">'.array_shift($errors).'</div>';
    }
}

// <h1 class="obvod">Админка</h1>
echo ('
	<div class="diva"> <h1 class="obvod">Выдача</h1>
    <form action="/" method="post" class="app one">
    
    <input type="text" selected id="nick" name="nick" placeholder="Ник игрока" class="apparea" value="'.$uuunick.'"><br>
    <select id="ab" class="city2" name="ab">
    <optgroup label="Наказания">
    <option value="ban">БАН </option>
    <option value="mute">МУТ </option>
    <option value="vmute">МУТ ГС</option>
    <option value="kick">КИК</option>
    </optgroup>
    <optgroup label="Помилования">
    <option value="unban">РАЗБАН</option>
    <option value="unmute">РАЗМУТ</option>
    <option value="vunmute">РАЗМУТ ГЧ</option>
    </optgroup>
    </select>
    <select id="ts" class="city2" name="ts">
    <option value="min">Минута</option>
    <option value="hour">Час</option>
    <option value="day">День</option>
    <option value="week">Неделя</option>
    <option value="month">Месяц</option>
    <option value="year">Год</option>
    <option value="perm">Навсегда</option>
    </select>
    <input type="text" id="day" name="time" placeholder="Кол-во" class="time">
    <button type="submit" id="button" class="city" name="vid">Выдать</button></input>
</form>');

echo $fax;
// echo $ab;
// echo $nick;
$html='';
$sqla = "SELECT * FROM report WHERE 1";
$result = $connect->query($sqla);

// $sqlaa = "SELECT * FROM city WHERE `player` = '$nick'";
// $resulta = $connect->query($sqlaa);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$pnick=$row["podayot"];
$nnick=$row['na_kogo'];
$id = $row['id'];
$reason = $row['reason'];
if ($reason == 'warzone'){
    $reas = 'Зашёл на запретку.';
}
if ($reason == 'Kill'){
    $reas = 'Убил меня просто так.';
}
if ($reason == 'prep'){
    $reas = 'Мешает мне играть.';
}
if ($reason == 'greaf'){
    $reas = 'Загриферил город/поселение/мой дом.';
}
if ($reason == 'cheats'){
    $reas = 'Читер.';
}
$html=$html.'
<form action="reportad.php" method="post">
<input type="hidden" name="id" value="'.$id.'">
</input><div class="user">
<img src="https://minotar.net/helm/'.$pnick.'/600.png "class="ava">
 <span class="POD"> '.$pnick.' ----> </span>
 <br><img src="https://minotar.net/helm/'.$nnick.'/600.png "class="ava">
 <span class="name">'.$nnick.'</span><br><span class="PODD">По причине: '.$reas.'</span>
 <br><input type="submit" name="minus" class="usera" value="-"><br><br>
 <input type="submit" name="plus" class="usera" value="+"></div></form>';
}}
if($admin != 'admin'):
    header('Location: /main');
endif;
echo ('</div>
<div class="divb"><h1 class="obvod">Репорты</h1>');
echo $html;
echo('</div>');
include ('../../assets/menu/main.php');
echo ('</div>
<div class="users">');
 echo ('</div>
 <div class="sett"></div>
 <script>
 </script>
 </body>
</html>');