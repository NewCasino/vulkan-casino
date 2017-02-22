<?php
//
//Контроллер страницы с акцией.
//
if (!defined("CASINOENGINE"))
    die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Lotteries.php');
$mLotteries = M_Lotteries::Instance();

$lotteries_query = $mLotteries->Get($_GET['lottery']);
if ($lotteries_query != "") {
	$news_tpl   = file_get_contents(TEMPLATE_DIR . "/page_lottery.tpl");
	$news_tpl   = str_replace("{title}", $lotteries_query['title'], $news_tpl);
	$news_tpl   = str_replace("{full_story}", $lotteries_query['full_story'], $news_tpl);
	$news_tpl   = str_replace("{date_start}", $lotteries_query['date_start'], $news_tpl);
	$news_tpl   = str_replace("{date_end}", $lotteries_query['date_end'], $news_tpl);
	echo $news_tpl;
} 
else {
	echo "<p style='text-align: center; padding: 0px 0px 35px; 0px;'>Акция не найдена!</p>";
}
?>