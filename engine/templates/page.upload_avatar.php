<?php
//
//���������� �������� ����������������� �������.
//
if (!defined("CASINOENGINE")) {
	die("��� �������!<script>location.href='/';</script>");
}

if (!isset($_FILES['avatar']['name'])){
	die("��� �������!<script>location.href='/';</script>");
}

//����������� ����������.
require_once ('m/M_Files.php');
require_once ('m/M_Users.php');
$mFiles = M_Files::Instance();
$mUsers = M_Users::Instance();

$avatarName = $_FILES['avatar']['name'];
$avatarTpmName = $_FILES['avatar']['tmp_name'];

//��������� ������ �����.
$ext = $mFiles->GetExtension($avatarName);
if($mFiles->IsImage($ext) == false)
	die("�������������� ������� JPG, PNG ��� GIF");

//��������� ������ � ������ �������.
list ($widthImage, $heightImage) = getimagesize($avatarTpmName);
if($widthImage > 115 || $heightImage > 115)
	die("������ ������� �� ������ 115�115px");

//��������� ������ �� �������.
$fileSizeKB = intval(filesize($avatarTpmName)/1024);
if ($fileSizeKB < 1 || $fileSizeKB > 100)
	die('������������ ��� ����� 100��');

//����������� �����.
$fileName = uniqid('avatar-', true).$ext;
if(move_uploaded_file($avatarTpmName, 'img/avatars/'.$fileName)){
	$idUser = $mUsers->GetUserIdByLogin($_SESSION['login']);
	$idNewAvatar = $mUsers->AddAvatar($fileName, $idUser);
	$r = $mUsers->SetUserAvatar($idUser, $idNewAvatar);
	
	die('success');
}

die('��������� ����������� ������, �������� �� ���� ������������� �����.');