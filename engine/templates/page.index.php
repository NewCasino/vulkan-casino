<?php
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");

require_once('m/M_Games.php');
$mGames = M_Games::Instance();
$popular_games = $mGames->AllShortPopularInfo();
if(count($popular_games) > 0){
	$index_tpl = file_get_contents(TEMPLATE_DIR . "/page_index.tpl");
	$index_tpl = str_replace("{language}", $_SESSION['language'], $index_tpl);
	eval("?>" . $index_tpl . "<?");
}
else{
	echo '<p style="text-align: center; padding: 0 0 30px; 0">Игр нет...</p>';
}
?>