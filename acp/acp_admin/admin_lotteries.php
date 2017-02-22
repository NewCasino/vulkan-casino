<?php
//�������������
session_start();

//���������� ���������������� �� login
if(isset($_SESSION['session_admin']))
	$adm_login = $_SESSION['session_admin'];
else 
	die("<script>location.href='/acp/acp_admin/login.php';</script>");

define("CASINOENGINE", true);
define("ENGINE_DIR", $_SERVER['DOCUMENT_ROOT']."/engine_acp");

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once( ENGINE_DIR."/config/config.php" );
include_once("content/functions.php");

// ������������� ������.
	$title = "������ �������������� - �����";
	$menu = "lotteries";
	$menu_sub = "admin_lotteries.php";
	$error = "";

// ��������.
if(isset($_GET['mode'])) 
	$����� = $_GET['mode'];
else 
	$����� = '';
	// �������� ��������.
	$�����_������� = preg_match( "/^[a-z]{2,20}\$/D", $����� );

// ������������� �����.
	if(isset($_GET['id'])) 
		$id = $_GET['id']; 
	else 
		$id = '';
	// �������� ��������������.
	$id_������� = preg_match( "/^[0-9]{1,5}\$/D", $id );
	
//��������� ���������� ��������.
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

//�������� ������ ����� (ajax).
if ($����� == "add_img"){	
	$ext = $mFiles->GetExtension($_FILES['img']['name']);
	$fileName = uniqid().$ext;
	
	if($_GET['type'] == 'small')
		$file = $dirSmall.$fileName; 
	elseif ($_GET['type'] == 'big')
		$file = $dirBig.$fileName; 
	
	if($mFiles->IsImage($ext) == false){
		die("<p>������ ������ ������ �� ��������������</p>");
	}
	else{ 
		if (move_uploaded_file($_FILES['img']['tmp_name'], $file)) { 
			die($fileName); 
		} else {
			die("error");
		}
	}
}

//�������� �������.
if ($����� == "delete_img"){
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

// �������� �����.	
if ($����� == "delete" && $id != "" && $id_������� == true )
{
	$mLotteries->Delete($id);
	die("<script>
		alert('����� ������� ������!');
		location.href='/acp/acp_admin/admin_lotteries.php';
	</script>");
}

// ���������� �����.
if ($����� == "addlottery" && $_SERVER['REQUEST_METHOD'] == "POST"){
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
				alert('����� ������� ����������!');
				location.href='/acp/acp_admin/admin_lotteries.php';
			</script>");
	}
}

//�������������� �����.
if ($����� == "edit" && $id_������� == true){	
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
					alert('����� ������� ����������������!');
					location.href='/acp/acp_admin/admin_lotteries.php';
				</script>");
		}
	}
}

include_once( "content/content_lotteries.php" );
?>