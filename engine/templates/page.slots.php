<?php
if (!defined("CASINOENGINE"))
	exit("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$groupsGames = $mGames->SlotsGroups();
$allGamesInfo = $mGames->AllGamesInfo();

$page_slots_tpl = file_get_contents(TEMPLATE_DIR . "/page_slots.tpl");
eval("?>" . $page_slots_tpl . "<?");
?>