<?php
//
//Обработчик загрузки пользовательского аватара.
//
if (!defined("CASINOENGINE")) {
	die("Нет доступа!<script>location.href='/';</script>");
}

if (!isset($_FILES['avatar']['name'])){
	die("Нет доступа!<script>location.href='/';</script>");
}

//Подключение менеджеров.
require_once ('m/M_Files.php');
require_once ('m/M_Users.php');
$mFiles = M_Files::Instance();
$mUsers = M_Users::Instance();

$avatarName = $_FILES['avatar']['name'];
$avatarTpmName = $_FILES['avatar']['tmp_name'];

//Проверить формат файла.
$ext = $mFiles->GetExtension($avatarName);
if($mFiles->IsImage($ext) == false)
	die("Поддерживаемые форматы JPG, PNG или GIF");

//Проверить ширину и высоту рисунка.
list ($widthImage, $heightImage) = getimagesize($avatarTpmName);
if($widthImage > 115 || $heightImage > 115)
	die("Размер рисунка не больше 115х115px");

//Проверить размер КБ рисунка.
$fileSizeKB = intval(filesize($avatarTpmName)/1024);
if ($fileSizeKB < 1 || $fileSizeKB > 100)
	die('Максимальный вес файла 100кб');

//Перемещение файла.
$fileName = uniqid('avatar-', true).$ext;
if(move_uploaded_file($avatarTpmName, 'img/avatars/'.$fileName)){
	$idUser = $mUsers->GetUserIdByLogin($_SESSION['login']);
	$idNewAvatar = $mUsers->AddAvatar($fileName, $idUser);
	$r = $mUsers->SetUserAvatar($idUser, $idNewAvatar);
	
	die('success');
}

die('Произошла неизвестная ошибка, сообщите об этом администрации сайта.');