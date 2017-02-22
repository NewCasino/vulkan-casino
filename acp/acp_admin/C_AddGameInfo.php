<?php
//
//Контроллер просмотра списка игр.
//

session_start();
if(!isset($_SESSION['session_admin']))
	die("<script>location.href='/acp/acp_admin/login.php';</script>");

define ('_Q3TA', true);
define("CASINOENGINE", true);

require_once($_SERVER['DOCUMENT_ROOT']."/engine/core/mysql_log.php");
require_once($_SERVER['DOCUMENT_ROOT']."/engine_acp/config/config.php");

require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Games.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Files.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/m/M_Tools.php');
$mGames = M_Games::Instance();
$mFiles = M_Files::Instance();
$mTools = M_Tools::Instance();

// Инициализация данных.
$title = "Добавить информацию по играм";
$menu = "games";
$menu_sub = "C_GamesListInfo.php";
$errors = array();
$dirScreenshots = '../../img/games/screenshots/';	//Папка с представлениями игр.
$dirSubmissions = '../../img/games/submissions/';	//Папка со скриншотами игр.
$groups = $mGames->AllGroups();
$imgsScreenshots = $mFiles->GetImgFromFolder($dirScreenshots);	//Все скриншоты.
$imgsSubmissions = $mFiles->GetImgFromFolder($dirSubmissions);	//Все представления.

$data = array(
	'name' => '',
	'link_game' => '',
	'link_info' => '',
	'id_group' => '',
	'img' => '',
	'description' => '',
	'rules' => '',
	'screenshots' => array(),
	'characteristics' => array(),
	'meta_keywords' => '',
	'meta_description' => ''
);


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($_POST['characteristics']))
		$characteristics = array();
	else
		$characteristics = $mTools->dataToArray($_POST['characteristics']);
	
	if(empty($_POST['screenshots']))
		$screenshots = array();
	else
		$screenshots = explode(' -,- ', $_POST['screenshots']);
	
	$r = $mGames->AddGameInfo(
		$_POST['name'],
		$_POST['link_game'],
		$_POST['link_info'],
		$_POST['id_group'],
		$_POST['img'],
		$_POST['description'],
		$_POST['rules'],
		$screenshots,
		$characteristics,
		$_POST['meta_description'],
		$_POST['meta_keywords']
		
	);
	
	if ($r['status'] == 'error'){
		$errors = $r['errors'];
		$data = $r['data'];
		$data['screenshots'] = $screenshots;
		$data['characteristics'] = $characteristics;
	}
	else{
		die("<script>
			alert('Добавленно!');
			location.href='/acp/acp_admin/C_ListGamesInfo.php';
		</script>");
	}
}

include_once("content/V_AddGameInfo.php");