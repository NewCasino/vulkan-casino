<?php
//�������� �� ������
if(!defined('CASINOENGINE')) { die("��� �������!<script>location.href='/';</script>"); }

	$����� 	= $_POST['login'];
	$������	= $_POST['password'];
	$�_������� = $_POST['send'];
 	$error = '';

	$error = '';
	$�����_�������  = preg_match("/^[A-Za-z0-9]{2,20}$/", $�����);
	$������_������� = preg_match("/^[A-Za-z0-9]{2,20}$/", $������);
	$�_�������_������� = preg_match("/^[0-9]$/", $�_�������);

	//���� ����� ��� ������ ������
    if ( ($����� == '') or ($������ == '') )
    { 	//���� ����� � ������ ������
    	$error = '�� �� ����� ����� ��� ������<br>';
    } else
    {   //���� ������ ������ � ������ � ����� ���������
    	if ( ($�����_������� == true) and ($������_������� == true))
    	{
    		{
    		//���� �� � �����
    		//�������� ���� �� ������ � ����, ������ �� ������� � ����� ������������
    		$result=@mysql_query("select * from clients where login='".filter($�����)."'");
			$row=mysql_fetch_array($result);
			$�����_����=$row['login'];
			$������_����=$row['pass'];
			//���� ����� � ������ ������
	    $������_md5 = md5($������);
            if ( $����� == $�����_���� and $������_md5 == $������_���� )
            {
	    		//�������������� ������ ������ ���� �� ���������
				$�����������_������ = 'CASINOSOFT' . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['HTTP_ACCEPT_CHARSET'];
				$_SESSION['sid'] = md5($�����������_������ . session_id());
	    		$_SESSION['login']=$�����;
	    		$_SESSION['error'] = '';
	    		$ip = $_SERVER['REMOTE_ADDR'];
	    		//����� ������� ip ������������ �� �������� �� �����
				@mysql_query("update clients set ip_last = '".$ip."' where login='".$_SESSION['login']."'");
				if (isAjaxRequest()) {
					exit(json_encode(array('status' => 0, 'message' => '', 'url' => '/' . $_SESSION['language'] . '/games')));
				}
	    		echo '<script>location.href="/'.$_SESSION['language'].'/games";</script>';
				exit;
			} else {
				$error .= '������� ���������� ����� � ������';
			}
			}
    	}else {
    		//���� ������ �� ���������
    		$error .= '������ �� ���������';
    	}
    }

	//���� ������� ��� �� ������ ��� ��������� ���������, error = '';
	if ($����� == '' and $������ == '')
	{ $error = ''; }

	include(ENGINE_DIR."forms/main_login.php");
?>
