<?php
//
//Контроллер страницы с акциями.
//
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Lotteries.php');
$mLotteries = M_Lotteries::Instance();
$lotteries_query = $mLotteries->All();

$lotteries_tpl        = file_get_contents(TEMPLATE_DIR . "/page_lotteries.tpl");
$lotteriesStr = "";
foreach ($lotteries_query as $tLotteries) {
	// Получение краткого описания
	$header_short_story = get_template($lotteries_tpl, "[short_story]", "[/short_story]");
	$header_short_story = str_replace("[short_story]", "", $header_short_story);
	$header_short_story = str_replace("[/short_story]", "", $header_short_story);
	// Установка значений
	$header_short_story = str_replace("{short_story}", $tLotteries['short_story'], $header_short_story);
	$header_short_story = str_replace("{full_story_link}",  "/lottery/" . $tLotteries['id_lottery'], $header_short_story);
	$header_short_story = str_replace("{title}", $tLotteries['title'], $header_short_story);
	$header_short_story = str_replace("{img}", 'img/lotteries/small/'.$tLotteries['img'], $header_short_story);
	$lotteriesStr .= $header_short_story;
}

// Установка обёртки.
$header_short_story = get_template($lotteries_tpl, "[wrapping_lotteries]", "[/wrapping_lotteries]");
$header_short_story = str_replace("[wrapping_lotteries]", "", $header_short_story);
$header_short_story = str_replace("[/wrapping_lotteries]", "", $header_short_story);
echo str_replace("{lotteries}", $lotteriesStr, $header_short_story);

if ($count_lotteries == 0)
	echo "<p style='text-align: center; padding: 0px 0px 35px; 0px;'>Акий нет...</p>";
?>