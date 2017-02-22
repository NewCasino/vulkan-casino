<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }
?>

<? if ($_SESSION['sid'] == '' or $_SESSION['login'] == '') {

	if($error != '') { echo "<br><br><center><font style='font-size:16px;color:#FF4500'>Ошибка: ".htmltext($error)."</font></center>"; }
?>

<?=$redirect?>
<? } else {
	//Иначе сообщаем что вход был осуществлён
	echo 'Вы уже вошли.Чтобы зайти нужно сначало выйти <a href="/?logout">exit</a>';
	}
?>


