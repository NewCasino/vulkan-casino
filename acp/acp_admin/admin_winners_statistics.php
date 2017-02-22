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
$title = "Панель администратора - Наши победители";
$menu = "winners";
$menu_sub = "admin_winners_statistics.php";
$errors = array ();

//
define ('_Q3TA', true);
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Winners.php');
$mWinners = M_Winners::Instance();
$errors = array ();	

if (isset($_GET['mode']))
	$mode = $_GET['mode'];
else
	$mode = null;

if ($mode == 'update_list'){
	$cUpdates = $mWinners->UpdateList();
	die("<script>
			alert('Обновлено ".$cUpdates."')
			location.href='/acp/acp_admin/admin_winners_statistics.php';
		</script>");
}

if ($mode == 'delete'){
	$idWin = $_GET['id'];
	$cUpdates = $mWinners->Delete($idWin);
	die("<script>
			alert('Удалено ".$cUpdates." записей.')
			location.href='/acp/acp_admin/admin_winners_statistics.php';
		</script>");
}

if ($mode == 'activate'){
	$idWin = $_GET['id'];
	$mWinners->Activation($idWin);
	die("<script>
			alert('Запись активирована')
			location.href='/acp/acp_admin/admin_winners_statistics.php';
		</script>");
}

if ($mode == 'deactivate'){
	$idWin = $_GET['id'];
	$mWinners->Deactivation($idWin);
	die("<script>
			alert('Запись деактивирована')
			location.href='/acp/acp_admin/admin_winners_statistics.php';
		</script>");
}

if ($mode == 'edit'){
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = intval($_GET['id']);
		$update = $mWinners->Edit($id, $_POST['login'], $_POST['bet'], $_POST['win'], $_POST['game']);
		
		if ($update['status'] == false){
			$errors = $update['errors'];
			$winner = $update['data'];
		}
		
		if ($update['status'] == true)
			die("<script>
				alert('Запись изменена.')
				location.href='/acp/acp_admin/admin_winners_statistics.php';
			</script>");
	}
	else{
		$idWin = $_GET['id'];
		$winner = $mWinners->Get($idWin);
		
		if ($winner == false)
			die("<script>
				location.href='/acp/acp_admin/admin_winners_statistics.php';
			</script>");
	}
}

if ($mode == null){
	$winners = $mWinners->GetWinners();
	$typeWinners = 'display';
}

if ($mode == 'locked'){
	$winners = $mWinners->LockedWinners();
	$typeWinners = 'locked';
}

if ($mode == 'incompatible'){	//несовпадаемые
	$winners = $mWinners->IncompatibleWinners();
	$typeWinners = 'incompatible';
}

if ($mode == 'remnant'){	//остаток
	$winners = $mWinners->RemnantWinners();
	$typeWinners = 'remnant';
}

if ($mode == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST'){
	$winners = array ();
	$rAdd = $mWinners->Add($_POST['login'], $_POST['bet'], $_POST['win'], $_POST['game']);
	
	if ($rAdd['status'] == false){
		$winner = $rAdd['data'];
		$errors = $rAdd['errors'];
	}
	
	if ($rAdd['status'] == true){
		die("<script>
			location.href='/acp/acp_admin/admin_winners_statistics.php';
		</script>");
	}
}

include_once( "content/content_winners_statistics.php" );
?>