<?php
//�������� �� ������
if(!defined('CASINOENGINE')) { die("��� �������!<script>location.href='/';</script>"); }
?>
<div style='padding: 0px 20px 30px 20px;'>
<h1 style="font-size: 1.5em; line-height: 1em; font-weight: normal; ">������������� ������.</h1>
<? if($error != '') { echo "<font style='font-size:10px;color:#FF4500'>������: ".htmltext($error)."</font><br>"; } ?>
<form name="form" action="/<?=$_SESSION['language']?>/forgot_password" method="post">
	������� ��� ����� �� �����<br>
	<INPUT style='width:200px;' name='forgot_login' maxLength='30' value="<?=htmltext($�������������_�����)?>"><br>
	��� ��� �������� ������ ��������� ��� �����������<br>
	<INPUT style='width:200px;' name='forgot_email' maxLength='30' value="<?=htmltext($�������������_email)?>"><br>
	���<br>
	<img id="captcha" src="/engine/securimage/securimage_show_example.php "><br><a href="#" onclick="document.getElementById('captcha').src = '/engine/securimage/securimage_show_example.php?' + Math.random(); return false">�������� �����������</a><br>
	������� ���<br>
	<input style="width:200px;" type="text" name="captcha_code" size="25" maxlength="8" value="<?=htmltext($�������������_�����)?>" />
	<br>
	<INPUT type="submit" value="�����������" name="submit">
</form>
</div>