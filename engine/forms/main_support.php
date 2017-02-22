<?php
if(!defined('CASINOENGINE'))
	die("Нет доступа!<script>location.href='/';</script>");
?>
<div style='padding: 0px 20px 30px 20px;'>
	<p style='color: #FF9900; font-weight: bold; text-align: center; font-size: 24px; margin: 0 0 10px 0;'>Служба поддержки Онлайн Казино!</p>
	<div style="text-align: justify;">
	Общие сведения об игре в <a href="/"><strong>онлайн казино</strong></a>. 
	Вы можете вообще ничего не знать об игре в интернет казино но уже сразу же начать играть во многие <a href="/"><strong>игровые автоматы</strong></a> в нашем интернет казино. Дело в том, что правила большинства игр очень просты и все необходимые разнесения вы можете уточнить у нашей службе поддержки. Кроме того в нашем казино, результаты этих игр вовсе не зависят отопыта, мастерства и знаний игроков и являются лишь следствием обычной случайности и простого везения. Но вместе с тем в казино есть игры, например, все виды покера и блек-джека, которые требуют от игрока дополнительных знаний и умений! 
	Если в ходе игры у вас возникают вопросы и трудности то Вы можете обращаться в службу поддержки нашего казино которая работает 24/7. 
	</div>

	<form name="reg_your_details" method="post" action="/<?=$_SESSION['language']?>/support">
		<b>Ваш email адрес:</b><br>
		<input name="email" type="text" maxLength='30' id="email" style="width:180px;" value="<?  echo htmltext($поддержка_email); ?>"><br>
		Пример: my_mail@email.com
		<br>
		<b>Тема:</b><br>
		<input name="subject" type="text" id="pass1" style="width:400px;" value="<?  echo htmltext($поддержка_тема); ?>">
		<br>
		<b>Ваш вопрос или сообщение:</b><br>
		<textarea style="width:400px;height:150px;" name="message" rows="5"><?  echo htmltext($поддержка_сообщение); ?></textarea><br>
		Код:<br>
		<img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
		<br>
		<a style='text-decoration: none;' href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false;">Обновить изображение</a><br>
		Введите Код:<br>
		<input type="text" name="captcha_code" size="10" maxlength="8" value="<?=htmltext($поддержка_капча)?>" />
		<br>
		<? if(!empty($error)) { echo "<font style='color:#FF4500'>Ошибка: ".$error."</font><br>"; } ?>
		<input id="reg_your_details_submit" style="width:200px;" type="submit" value="Отправить сообщение">
	</form>

</div>