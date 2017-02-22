<?php
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");
	
require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$gameInfo = $mGames->GetGameInfoBLI($_GET['link_info']);

if (count($gameInfo)>0){
	$gameInfo['screenshots'] = unserialize($gameInfo['screenshots']);
	$gameInfo['characteristics'] = unserialize($gameInfo['characteristics']);
	
	$page_game_info = file_get_contents(TEMPLATE_DIR . "/page_game_info.tpl");
	$page_game_info = str_replace("{language}", $_SESSION['language'], $page_game_info);
	eval("?>" . $page_game_info . "<?");
}
else{
	echo '<p style="text-align: center; padding: 0 0 30px; 0">Информация по игре не найдена...</p>';
}
?>