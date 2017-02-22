<?php
//
//��������� ���������� ����� ��� �� �������������.
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
$title = "���������� �������� ���.";
$menu = "games";
$menu_sub = "C_GamesGroup.php";
$errors = array ();
$groups = $mGames->AllGroups();

// ��������.
if(isset($_GET['mode']) && (preg_match("/^[a-z]{2,20}$/", $_GET['mode']) == true)) 
	$mode = $_GET['mode'];
else
	$mode = null;

$data = array(
	'name' => ''
);

//��������.
if ($mode == 'add' && ($_SERVER['REQUEST_METHOD'] == 'POST')){
	$r = $mGames->AddGroup($_POST['name']);
	
	if($r['status'] == 'error'){
		$data = $r['data'];
		$errors = $r['errors'];
	}
	else{
		die("<script>
			alert('����������!');
			location.href='/acp/acp_admin/C_GamesGroup.php';
		</script>");
	}
}

//�������������.
if ($mode == 'edit'){
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		$r = $mGames->GetGroup($_GET['id']);
		$data = $r;
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$r = $mGames->EditGroup($_GET['id'], $_POST['name']);
		if($r['status'] == 'error'){
			$data = $r['data'];
			$errors = $r['errors'];
		}
		else{
			die("<script>
				alert('��������� ���������!');
				location.href='/acp/acp_admin/C_GamesGroup.php';
			</script>");
		}
	}
}

//�������.
if ($mode == 'delete'){
	$r = $mGames->DeleteGroup($_GET['id']);
	
	if($r == true)
		die("<script>
			alert('��������!');
			location.href='/acp/acp_admin/C_GamesGroup.php';
		</script>");
}

include_once("content/V_GamesGroup.php");