<?php
if(!defined('CASINOENGINE'))
	die("��� �������!<script>location.href='/';</script>");
?>
<div style='padding: 0px 20px 30px 20px;'>
	<p style='color: #FF9900; font-weight: bold; text-align: center; font-size: 24px; margin: 0 0 10px 0;'>������ ��������� ������ ������!</p>
	<div style="text-align: justify;">
	����� �������� �� ���� � <a href="/"><strong>������ ������</strong></a>. 
	�� ������ ������ ������ �� ����� �� ���� � �������� ������ �� ��� ����� �� ������ ������ �� ������ <a href="/"><strong>������� ��������</strong></a> � ����� �������� ������. ���� � ���, ��� ������� ����������� ��� ����� ������ � ��� ����������� ���������� �� ������ �������� � ����� ������ ���������. ����� ���� � ����� ������, ���������� ���� ��� ����� �� ������� �������, ���������� � ������ ������� � �������� ���� ���������� ������� ����������� � �������� �������. �� ������ � ��� � ������ ���� ����, ��������, ��� ���� ������ � ����-�����, ������� ������� �� ������ �������������� ������ � ������! 
	���� � ���� ���� � ��� ��������� ������� � ��������� �� �� ������ ���������� � ������ ��������� ������ ������ ������� �������� 24/7. 
	</div>

	<form name="reg_your_details" method="post" action="/<?=$_SESSION['language']?>/support">
		<b>��� email �����:</b><br>
		<input name="email" type="text" maxLength='30' id="email" style="width:180px;" value="<?  echo htmltext($���������_email); ?>"><br>
		������: my_mail@email.com
		<br>
		<b>����:</b><br>
		<input name="subject" type="text" id="pass1" style="width:400px;" value="<?  echo htmltext($���������_����); ?>">
		<br>
		<b>��� ������ ��� ���������:</b><br>
		<textarea style="width:400px;height:150px;" name="message" rows="5"><?  echo htmltext($���������_���������); ?></textarea><br>
		���:<br>
		<img id="captcha" src="/engine/securimage/securimage_show_example.php " alt="CAPTCHA Image" />
		<br>
		<a style='text-decoration: none;' href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false;">�������� �����������</a><br>
		������� ���:<br>
		<input type="text" name="captcha_code" size="10" maxlength="8" value="<?=htmltext($���������_�����)?>" />
		<br>
		<? if(!empty($error)) { echo "<font style='color:#FF4500'>������: ".$error."</font><br>"; } ?>
		<input id="reg_your_details_submit" style="width:200px;" type="submit" value="��������� ���������">
	</form>

</div>