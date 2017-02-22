<?php
if (!defined("CASINOENGINE"))
	exit("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$groupsGames = $mGames->AllGroups();
$allGamesInfo = $mGames->AllGamesInfo();

$page_games_tpl = file_get_contents(TEMPLATE_DIR . "/page_games.tpl");
eval("?>" . $page_games_tpl . "<?");
?>