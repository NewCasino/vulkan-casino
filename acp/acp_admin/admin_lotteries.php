<?php
//Инициализация
session_start();

//Отправляем неавторизованных на login
if(isset($_SESSION['session_admin']))
	$adm_login = $_SESSION['session_admin'];
else 
	die("<script>location.href='/acp/acp_admin/login.php';</script>");

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once( ENGINE_DIR."/config/config.php" );
include_once("content/functions.php");

// Инициализация данных.
	$title = "Панель администратора - Акции";
	$menu = "lotteries";
	$menu_sub = "admin_lotteries.php";
	$error = "";

// Действие.
if(isset($_GET['mode'])) 
	$режим = $_GET['mode'];
else 
	$режим = '';
	// Проверка действия.
	$режим_фильтер = preg_match( "/^[a-z]{2,20}\$/D", $режим );

// Идентификатор акции.
	if(isset($_GET['id'])) 
		$id = $_GET['id']; 
	else 
		$id = '';
	// Проверка идентификатора.
	$id_фильтер = preg_match( "/^[0-9]{1,5}\$/D", $id );
	
//Настройка параметров рисунков.
$dirSmall = '../../img/lotteries/small/';
$dirBig = '../../img/lotteries/big/';
$errors = array ();
$lotteryArray = array();

define ('_Q3TA', true);
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Lotteries.php');
$mLotteries = M_Lotteries::Instance();

require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Files.php');
$mFiles = M_Files::Instance();

$filetypes = array(
	'.jpg',
	'.JPG',
	'.gif',
	'.GIF',
	'.bmp',
	'.BMP',
	'.png',	
	'.PNG',
	'.jpeg',
	'.JPEG'
);

//Загрузка нового файла (ajax).
if ($режим == "add_img"){	
	$ext = $mFiles->GetExtension($_FILES['img']['name']);
	$fileName = uniqid().$ext;
	
	if($_GET['type'] == 'small')
		$file = $dirSmall.$fileName; 
	elseif ($_GET['type'] == 'big')
		$file = $dirBig.$fileName; 
	
	if($mFiles->IsImage($ext) == false){
		die("<p>Данный формат файлов не поддерживается</p>");
	}
	else{ 
		if (move_uploaded_file($_FILES['img']['tmp_name'], $file)) { 
			die($fileName); 
		} else {
			die("error");
		}
	}
}

//Удаление рисунка.
if ($режим == "delete_img"){
	$deleteImgName = iconv("utf-8", "windows-1251", $_POST['img_name']);

	if ($_GET['type'] == 'small')
		$file = $dirSmall.$deleteImgName;
	elseif ($_GET['type'] == 'big')
		$file = $dirBig.$deleteImgName;
	
	if(unlink($file) == true)
		exit(json_encode(array('status' => 1)));
	else
		exit(json_encode(array('status' => 0)));
}	

// Удаление акции.	
if ($режим == "delete" && $id != "" && $id_фильтер == true )
{
	$mLotteries->Delete($id);
	die("<script>
		alert('Акция успешно удалёна!');
		location.href='/acp/acp_admin/admin_lotteries.php';
	</script>");
}

// Добавление акции.
if ($режим == "addlottery" && $_SERVER['REQUEST_METHOD'] == "POST"){
	$rAdd = $mLotteries->Add(
		$_POST['title'], 
		$_POST['date_start'], 
		$_POST['date_end'], 
		$_POST['lottery_short'], 
		$_POST['lottery_full'],
		$_POST['keywords'], 
		$_POST['description'], 
		$_POST['small_img'], 
		$_POST['big_img'], 
		$_POST['need_big']
	);
	
	$errors = $rAdd['errors'];
	
	if ($rAdd['status'] == false){
		$errors = $rAdd['errors'];
		$lotteryArray = $rAdd['data'];
	}
	
	if ($rAdd ['status'] == true){
		die("<script>
				alert('Акция успешна добавленна!');
				location.href='/acp/acp_admin/admin_lotteries.php';
			</script>");
	}
}

//Редактирование акции.
if ($режим == "edit" && $id_фильтер == true){	
	if ($_SERVER['REQUEST_METHOD'] == "GET"){
		$id = intval($id);
		$lotteryArray = $mLotteries->Get($id);
	}
	elseif($_SERVER['REQUEST_METHOD'] == "POST"){
		$rEdit = $mLotteries->Edit(
			$id, 
			$_POST['title'], 
			$_POST['date_start'], 
			$_POST['date_end'], 
			$_POST['lottery_short'], 
			$_POST['lottery_full'],
			$_POST['keywords'], 
			$_POST['description'], 
			$_POST['small_img'], 
			$_POST['big_img'], 
			$_POST['need_big']
		);
		
		if ($rEdit['status'] == false){
			$errors = $rEdit['errors'];
			$lotteryArray = $rEdit['data'];
		}
		
		if ($rEdit['status'] == true){
			die("<script>
					alert('Акция успешно отредактированна!');
					location.href='/acp/acp_admin/admin_lotteries.php';
				</script>");
		}
	}
}

include_once( "content/content_lotteries.php" );
?>