<?php
//�������� �� ������
if(!defined('CASINOENGINE')) { die("��� �������!<script>location.href='/';</script>"); }
?>

<? if ($_SESSION['sid'] == '' or $_SESSION['login'] == '') {

	if($error != '') { echo "<br><br><center><font style='font-size:16px;color:#FF4500'>������: ".htmltext($error)."</font></center>"; }
?>

<?=$redirect?>
<? } else {
	//����� �������� ��� ���� ��� ����������
	echo '�� ��� �����.����� ����� ����� ������� ����� <a href="/?logout">exit</a>';
	}
?>


