<?php
if (!defined("CASINOENGINE"))
	exit("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$groupsGames = $mGames->RouletteGroups();
$allGamesInfo = $mGames->AllGamesInfo();

$page_roulettes_tpl = file_get_contents(TEMPLATE_DIR . "/page_roulettes.tpl");
eval("?>" . $page_roulettes_tpl . "<?");
?>