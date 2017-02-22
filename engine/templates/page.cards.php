<?php
if (!defined("CASINOENGINE"))
	exit("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$groupsGames = $mGames->CardsGroups();
$allGamesInfo = $mGames->AllGamesInfo();

$page_cards_tpl = file_get_contents(TEMPLATE_DIR . "/page_cards.tpl");
eval("?>" . $page_cards_tpl . "<?");
?>