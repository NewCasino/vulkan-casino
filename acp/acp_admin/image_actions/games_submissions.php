<?php
//
//���������� �������� � ��������, ��������� ���.
//

session_start();
if(!isset($_SESSION['session_admin'])) 
	die("<script>location.href='/acp/acp_admin/login.php';</script>");

define ('_Q3TA', true);
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Files.php');
$mFiles = M_Files::Instance();

$dirImg = '../../../img/games/submissions/';

//
//�������� �������.
//
if (isset($_GET['mode']) && ($_GET['mode'] == 'add')){
	if (!isset($_FILES['img']['tmp_name']))
		die();
	
	$imgTmpName = $_FILES['img']['tmp_name'];
	$imgName = $_FILES['img']['name'];
	
	//��������� ������ �����.
	$ext = $mFiles->GetExtension($imgName);
	if($mFiles->IsImage($ext) == false)
		die("error_1");
	
	//��������� ������ �� �������.
	$sizeKB = intval((filesize($imgTmpName)/1024));
	if ($sizeKB > 200)
		die ('error_2');
	
	//����������� �����.
	$fileName = uniqid('i-', true).$ext;
	if(move_uploaded_file($imgTmpName, $dirImg.$fileName))
		die($fileName);
}

//
//�������� ������� �� �����.
//
if (isset($_GET['mode']) && ($_GET['mode'] == 'delete')){
	$imgName = iconv("utf-8", "windows-1251", $_POST['img_name']);
	
	if(unlink($dirImg.$imgName) == true)
		exit(json_encode(array('status' => 1)));
	else
		exit(json_encode(array('status' => 0)));
}

die('Forbidden');	//:D