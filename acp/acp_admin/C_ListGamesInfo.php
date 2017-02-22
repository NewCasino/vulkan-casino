<?php
//
//���������� ��������� ������ ���.
//

session_start();
if(!isset($_SESSION['session_admin']))
	die("<script>location.href='/acp/acp_admin/login.php';</script>");

define ('_Q3TA', true);
define("CASINOENGINE", true);

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/engine_acp/config/config.php");

require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Games.php');
$mGames = M_Games::Instance();

// ������������� ������.
$title = "���������� �� �����";
$menu = "games";
$menu_sub = "C_GamesListInfo.php";
$games = $mGames->AllGamesInfo();

// ��������.
if(isset($_GET['mode']) && (preg_match("/^[a-z_]{2,20}$/", $_GET['mode']) == true)) 
	$mode = $_GET['mode'];

//�������.
if (isset($_GET['mode']) && ($_GET['mode'] == 'delete')){
	$r = $mGames->DeleteGameInfo($_GET['id']);
	
	if($r == true)
		die("<script>
			alert('��������!');
			location.href='/acp/acp_admin/C_ListGamesInfo.php';
		</script>");
}

//���������� �������� ���������� ����.
if ($mode == 'set_popular'){
	$mGames->SetPopular($_GET['id']);
	die("<script>
			alert('�������������!');
			location.href='/acp/acp_admin/C_ListGamesInfo.php';
		</script>");
}

//����� �������� ���������� ����.	
if ($mode == 'pullof_popular'){
	$mGames->PullOfPopular($_GET['id']);
	die("<script>
			alert('���������������!');
			location.href='/acp/acp_admin/C_ListGamesInfo.php';
		</script>");
}

include_once("content/V_ListGamesInfo.php");