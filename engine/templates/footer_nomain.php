<?php
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Tools.php');
$mTools = M_Tools::Instance();
$siteadress = $mTools->GetSiteAdress();

$footer_nomain_tpl = file_get_contents(TEMPLATE_DIR . "/footer_nomain.tpl");
$footer_nomain_tpl  = str_replace("{siteadress}", $siteadress, $footer_nomain_tpl);
$footer_nomain_tpl  = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $footer_nomain_tpl);
$footer_nomain_tpl  = str_replace("{language}", $_SESSION['language'], $footer_nomain_tpl);
$footer_nomain_tpl  = str_replace("{users_online}", $_SESSION['online'], $footer_nomain_tpl);

//get template lotteries
$lottery_template = get_template($footer_nomain_tpl, "[lotteries_wrapping]", "[/lotteries_wrapping]");

//header
$head_lottery_template = get_template($lottery_template, "[lottery_wrapping_top]", "[/lottery_wrapping_top]");
$head_lottery_template = str_replace("[lottery_wrapping_top]", "", $head_lottery_template);
$head_lottery_template = str_replace("[/lottery_wrapping_top]", "", $head_lottery_template);
	
//links
$links_template = get_template ($lottery_template, "[list_navigation]", "[/list_navigation]");
$links_navigation = "";
if ($count_pages_lotteries > 1){
	for ($i = 0; $i < $count_pages_lotteries; $i++){
		if ($i == 0)
			$links_navigation .= str_replace("{special_class}", "marker_link_select", $links_template);
		else
			$links_navigation .= str_replace("{special_class}", "marker_link_empty", $links_template);
	}
}
$head_lottery_template = str_replace($links_template, $links_navigation, $head_lottery_template);
$head_lottery_template = str_replace("[list_navigation]", "", $head_lottery_template);
$head_lottery_template = str_replace("[/list_navigation]", "", $head_lottery_template);

//loteries block
$lottery_block_tempalte = get_template($lottery_template, "[lottery_block]", "[/lottery_block]");
$lottery_block_tempalte = str_replace("[lottery_block]", "", $lottery_block_tempalte);
$lottery_block_tempalte = str_replace("[/lottery_block]", "", $lottery_block_tempalte);
// Подстановка данных
$arrLotteriesModifer = $arr_lotteries;
if ($countLotteriesInBlock >= count($arr_lotteries)){
	$countEmptyBlocks = $countLotteriesInBlock - count($arr_lotteries);
}
elseif($countLotteriesInBlock == 1 || $countLotteriesInBlock == 0){
	$countEmptyBlocks = 0;
}
else{
	$countEmptyBlocks = $countLotteriesInBlock - (count($arr_lotteries)%$countLotteriesInBlock);
}
for ($i = 0; $i<$countEmptyBlocks; $i++){
	$arrLotteriesModifer [] = array ('id_lottery'=> '', 'img' => "default.jpg", "title" => "Акция отсутствует...", "short_story" => "");
}
//Наполнение акциями.
$counterDisplayNone = 0; // Счетчик для скрывания акций
$counterForLClass = 0;	// Счетчик для l_ класса
$sringLotteries = "";	// Акции для выдачи
$tLotteryblock = "";	// Временная строка
$classString = "";	// Допонительные классы
foreach ($arrLotteriesModifer as $arrLotteryModifer){
	$classString .= " l_".$counterForLClass;
	if ($counterDisplayNone >= $countLotteriesInBlock)
		$classString .= " displayNone";
	$tLotteryblock = str_replace("{adding_classes}", $classString, $lottery_block_tempalte);
	$tLotteryblock = str_replace("{lottery_img}", 'img/lotteries/small/'.$arrLotteryModifer['img'], $tLotteryblock);
	$tLotteryblock = str_replace("{lottery_title}", $arrLotteryModifer['title'], $tLotteryblock);
	$tLotteryblock = str_replace("{lottery_short_story}", $arrLotteryModifer['short_story'], $tLotteryblock);
	$tLotteryblock = str_replace("{lottery_link}", "/lottery/".$arrLotteryModifer['id_lottery'], $tLotteryblock);
	if (empty($arrLotteryModifer['id_lottery'])){
		$tLinks = get_template($tLotteryblock, "[link_to_lottery]", "[/link_to_lottery]");
		$tLotteryblock = str_replace($tLinks, "", $tLotteryblock);			
	}
	$tLotteryblock = str_replace("[link_to_lottery]", "", $tLotteryblock);
	$tLotteryblock = str_replace("[/link_to_lottery]", "", $tLotteryblock);
	
	$sringLotteries .= $tLotteryblock;
	$tLotteryblock = "";
	$classString = "";
	$counterDisplayNone++;
	if ((floor($counterDisplayNone / $countLotteriesInBlock)) == ($counterDisplayNone / $countLotteriesInBlock) && $counterDisplayNone != 0){
		$counterForLClass++;
	}
}

//footer
$bottom_lottery_template = get_template($lottery_template, "[lottery_wrapping_bottom]", "[/lottery_wrapping_bottom]");
$bottom_lottery_template = str_replace("[lottery_wrapping_bottom]", "", $bottom_lottery_template);
$bottom_lottery_template = str_replace("[/lottery_wrapping_bottom]", "", $bottom_lottery_template);
//replace data
$footer_nomain_tpl = str_replace ($lottery_template, $head_lottery_template.$sringLotteries.$bottom_lottery_template, $footer_nomain_tpl);
$footer_nomain_tpl = str_replace ("[lotteries_wrapping]", "", $footer_nomain_tpl);
$footer_nomain_tpl = str_replace ("[/lotteries_wrapping]", "", $footer_nomain_tpl);
eval("?>" . $footer_nomain_tpl . "<?");
?>