<?php
if (!defined("CASINOENGINE"))
	exit("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$groupsGames = $mGames->JackpotsGroups();
$allGamesInfo = $mGames->AllGamesInfo();

$page_jackpots_tpl = file_get_contents(TEMPLATE_DIR . "/page_jackpots.tpl");
eval("?>" . $page_jackpots_tpl . "<?");
?>