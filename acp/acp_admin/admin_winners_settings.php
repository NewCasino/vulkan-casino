<?php
session_start();
error_reporting(E_ALL);
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
	$menu_sub = "admin_winners_settings.php";
//
define ('_Q3TA', true);
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Winners.php');
$mWinners = M_Winners::Instance();
$errors = array ();

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	$starMoney = intval($_POST['start_money']);
	$countWinners = intval($_POST['count_winners']);
	$errors = array ();
	
	$report = $mWinners->SetSettings($starMoney, $countWinners);
	$errors = $report['errors'];
		
    if ($report['status'] == true){
		die (
			"<script>
				alert('Данные изменены!');
				location.href='/acp/acp_admin/admin_winners_settings.php';
			</script>"
		);
	}
}
else{	
	$winSettings = $mWinners->GetSettings();
	$starMoney = $winSettings['start_money'];
	$countWinners = $winSettings['count_winners'];
}
include_once( "content/content_winners_settings.php" );
?>
