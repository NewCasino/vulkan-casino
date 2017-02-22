<?php
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Lotteries.php');
require_once ('m/M_Winners.php');
require_once ('m/M_Users.php');
require_once ('m/M_Tools.php');
$mLotteries = M_Lotteries::Instance();
$mWinners = M_Winners::Instance();
$mUsers = M_Users::Instance();
$mTools = M_Tools::Instance();

if (!empty($_SESSION['login']))
	$clients_query = $mUsers->GetUserInfoByLogin($_SESSION['login']);

$header_nomain_tpl = file_get_contents(TEMPLATE_DIR . "/header_nomain.tpl");
$header_nomain_tpl = str_replace("{language}", $_SESSION['language'], $header_nomain_tpl);

if (!empty($_SESSION['login'])){
	//Аватар пользователя.
$avatar_name = $mUsers->GetUserAvatarName($clients_query['id_avatar']);
$avatar_src = "/img/avatars/".$avatar_name;
	$header_nomain_tpl = str_replace("{cash_wmr}", $clients_query['cash'], $header_nomain_tpl);
	$header_nomain_tpl = str_replace("{id}", $clients_query['id'], $header_nomain_tpl);
	$header_nomain_tpl = str_replace("{avatar_src}", $avatar_src, $header_nomain_tpl);
	$header_nomain_tpl = str_replace("{cash_fun}", $clients_query['cashfun'], $header_nomain_tpl);
	$header_nomain_tpl = str_replace("{login}", $_SESSION['login'], $header_nomain_tpl);
	$header_nomain_tpl = str_replace("{cash_partnerka}",  $clients_query['cash_ref'], $header_nomain_tpl);
}

//Джекпот
$newJP = $mTools->GetJackpot(true);
$arrayJP = str_split ($newJP);
$howMuch = 6 - count($arrayJP);
for ($i =0; $i < $howMuch; $i++ ){
	array_unshift($arrayJP, '&nbsp;');
}
	
//Большие слайды.
$bigSlides = $mLotteries->GetBigSlides();									
$countBigSlides = 0;
	
//Слайд победителей.
$winners = $mWinners->GetWinners();
if(count($winners) > 1)
	array_unshift($winners, end($winners));
  
eval("?>" . $header_nomain_tpl . "<?");
?>