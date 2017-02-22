<?php
//
//Контроллер профиля пользователя.
//

//Проверка на index.
if (!defined("CASINOENGINE")) {
	die("Нет доступа!<script>location.href='/';</script>");
}
//Проверка сессии входа.
if ($_SESSION['login'] == "") {
	$_SESSION['needToLogin'] = true;
	die("<script>location.href='/';</script>");
}

//Подключение менеджеров.
require_once ('m/M_Users.php');
require_once ('m/M_Tools.php');
$mUsers = M_Users::Instance();
$mTools = M_Tools::Instance();

//Обработчик.
if (!isset($_POST['action']))
	$action = '';
else
	$action = $_POST['action'];

//Смена аватарки.(AJAX)
if ($action == "select_avatar"){
	$idUser = $mUsers->GetUserIdByLogin($_SESSION['login']);
	
	if ($mUsers->SetUserAvatar($idUser, $_POST['id_avatar']))
		die (json_encode(array('status' => 0, 'url' => '/ru/profile')));	//success
	else
		die (json_encode(array('status' => 1, 'url' => '')));	//fail
}

//ЦЕЛЬ ЧЕТКО РАЗДЕЛИТЬ C V
$tErrors = "";
//Данные пользователя.
$client_query = $mUsers->GetUserInfoByLogin($_SESSION['login']);

//Аватар пользователя.
$avatar_name = $mUsers->GetUserAvatarName($client_query['id_avatar']);
$avatar_src = "/img/avatars/".$avatar_name;

//Дата рождения.
$date_from_user_info = "";
if ($client_query['birthday'] != "0000-00-00"){
	$birthday = $mTools->DateDbToList($client_query['birthday']);
	$months_from_date = $mTools->monthsInGrammaticalCase;
	$date_from_user_info = $birthday['d']." ".$months_from_date[$birthday ['m']]." ".$birthday ['y'];
}

//Пол.
// 0 - неизвестно	1 - женщина		2 - мужчина
$userGender = '';
if ($client_query['gender'] == 1)
	$userGender = 'Женский';
elseif ($client_query['gender'] == 2)
	$userGender = 'Мужской';

$client_query ['cash'] = intval($client_query ['cash']);
$admin_amail = $mTools->GetAdminEmail();
$countries = $mTools->GetCountries();

//Смена аватара.
$tpl_avatar_src = "/img/avatars/";
$man_avatars = $mUsers->GetManAvatars();
$woman_avatars = $mUsers->GetWomanAvatars();
$user_avatars = $mUsers->GetUserAvatars($client_query['id']);

//*Велик :(
$page_profile_tpl = file_get_contents(TEMPLATE_DIR . "/page_profile.tpl");

//Простая загрузка страницы.
if ($action == "") {
	//Формируем список переменных.
	$id_country = $client_query['id_country'];
	$fio = $client_query['fio'];
	$number_phone = $client_query['number_phone'];
	$birthday_day = $birthday ['d'];
	$birthday_month = $birthday ['m'];
	$birthday_year = $birthday ['y'];
	$gender = $client_query ['gender'];
	$icq = $client_query ['icq'];
	$skype = $client_query ['skype'];
}

//Обновление данных пользователя.
if ($action == "update"){
	$rUpdate = $mUsers->UpdateUserInfo(
		$client_query ['id'],
		$_POST['user_country'],
		$_POST['fio'],
		$_POST['number_phone'],
		$_POST['birthday_day'],
		$_POST['birthday_month'],
		$_POST['birthday_year'],
		$_POST['gender'],
		$_POST['icq'],
		$_POST['skype'],
		$_POST['new_password'],
		$_POST['new_password_repeat'],
		$_POST['retro_password']
	);
	
	if ($rUpdate['status'] === true)
		die("<script>location.href='/{$_SESSION['language']}/profile';</script>");
	
	//Новый обработчик ошибок. 2.0
	foreach($rUpdate ['errors'] as $k=>$error){
		$page_profile_tpl = str_replace('{e_'.$k.'}', $error, $page_profile_tpl);	
	}
	
	//Формируем список переменных.
	$id_country = $rUpdate['data']['user_country'];
	$fio = $rUpdate['data']['fio'];
	$number_phone = $rUpdate['data']['number_phone'];
	$birthday_day = $rUpdate['data']['birthday_day'];
	$birthday_month = $rUpdate['data']['birthday_month'];
	$birthday_year = $rUpdate['data']['birthday_year'];
	$gender = $rUpdate['data']['gender'];
	$icq = $rUpdate['data']['icq'];
	$skype = $rUpdate['data']['skype'];
}

//*+велик :(
$eTemplates = array(
	'e_fio',
	'e_phone',
	'e_icq',
	'e_skype',
	'e_new_password',
	'e_repeat_password',
	'e_retro_password'
);
foreach($eTemplates as $eTemplate){
	$page_profile_tpl = str_replace('{'.$eTemplate.'}', '', $page_profile_tpl);	
}

//Вывод данных.

//*Постоянные данные.
$page_profile_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_profile_tpl);
$page_profile_tpl = str_replace("{language}", $_SESSION['language'], $page_profile_tpl);
//Логин.
$page_profile_tpl = str_replace("{login}", $client_query['login'], $page_profile_tpl);	
	
//Аватарка пользователя.
$page_profile_tpl = str_replace("{avatar_src}", $avatar_src, $page_profile_tpl);	

//Дата рождения.
$page_profile_tpl = str_replace("{date_birthday}", $date_from_user_info, $page_profile_tpl);
if (empty($date_from_user_info))
	$page_profile_tpl = str_replace("{date_style}", 'display: none', $page_profile_tpl);
else
	$page_profile_tpl = str_replace("{date_style}", '', $page_profile_tpl);

//Пол.
$page_profile_tpl = str_replace('{user_gender}', $userGender, $page_profile_tpl);
if (empty($userGender))
	$page_profile_tpl = str_replace('{gender_style}', 'display: none', $page_profile_tpl);
else
	$page_profile_tpl = str_replace('{gender_style}', '', $page_profile_tpl);

//Достижения.

//Деньги пользователя.
$page_profile_tpl = str_replace("{money_rub}", $client_query['cash'], $page_profile_tpl);

//ID-пользователя.
$page_profile_tpl = str_replace("{id}", $client_query['id'], $page_profile_tpl);

//Почта пользователя.
$page_profile_tpl = str_replace("{email}", $client_query['email'], $page_profile_tpl);

//Почта Админа.
$page_profile_tpl = str_replace("{admin_email}", $admin_amail, $page_profile_tpl);

//Страны.			
$countries_result = "";
foreach ($countries as $country){
	if($id_country == $country['id'])
		$countries_result .= "<option selected value='{$country['id']}'>{$country['country']}</option>";
	else
		$countries_result .= "<option value='{$country['id']}'>{$country['country']}</option>";
}
$page_profile_tpl = str_replace("{countries_options}", $countries_result, $page_profile_tpl);

//ФИО.
$page_profile_tpl = str_replace("{fio}", $fio, $page_profile_tpl);

//Номер мобильного.
$page_profile_tpl = str_replace("{number_phone}", $number_phone, $page_profile_tpl);

//Годы рождения. (плохое решение, ради уменьшения количества действий.)
//Вычисляем даты. (18 лет назад, 60 лет назад)
$year_number = intval(date('Y'));
$first_year = $year_number-18;
$last_year = $year_number-60;
$years_result = "";
for ($i = $last_year; $i <= $first_year; $i++){
	if ($i == $birthday_year)
		$years_result .= "<option selected value='{$i}'>{$i}</option>";
	else
		$years_result .= "<option value='{$i}'>{$i}</option>";
}
$page_profile_tpl = str_replace("{birthday_year_options}", $years_result, $page_profile_tpl);

//Месяцы рождения. (Решение ради выбора selected)
$months = $mTools->months;
$months_result = "";
foreach($months as $num_month=>$name_month){
	if ($num_month == $birthday_month)
		$months_result .= "<option selected value='{$num_month}'>{$name_month}</option>";
	else
		$months_result .= "<option value='{$num_month}'>{$name_month}</option>";
}
$page_profile_tpl = str_replace("{birthday_month_options}", $months_result, $page_profile_tpl);

//Дни рождения.
$days_result = "";
for ($day = 1; $day<=31; $day++){
	if ($day == $birthday_day)
		$days_result .= "<option selected value='{$day}'>{$day}</option>";
	else
		$days_result .= "<option value='{$day}'>{$day}</option>";
}
$page_profile_tpl = str_replace("{birthday_day_options}", $days_result, $page_profile_tpl);

//Пол.
if ($gender == 0){
	$page_profile_tpl = str_replace("{gender_man}", "", $page_profile_tpl);
	$page_profile_tpl = str_replace("{gender_woman}", "", $page_profile_tpl);
}
elseif($gender == 1){
	$page_profile_tpl = str_replace("{gender_man}", "", $page_profile_tpl);
	$page_profile_tpl = str_replace("{gender_woman}", "checked", $page_profile_tpl);
}
elseif($gender == 2){
	$page_profile_tpl = str_replace("{gender_man}", "checked", $page_profile_tpl);
	$page_profile_tpl = str_replace("{gender_woman}", "", $page_profile_tpl);
}

//icq & Skype.
$page_profile_tpl = str_replace("{icq}", $icq, $page_profile_tpl);
$page_profile_tpl = str_replace("{skype}", $skype, $page_profile_tpl);

//Мужские аватары.
$tpl_man_avatars = "";
foreach ($man_avatars as $man_avatar){
	$tpl_man_avatars .= "<img src='{$tpl_avatar_src}{$man_avatar['name']}' class='orange' alt='{$man_avatar['id']}'>";
}
$page_profile_tpl = str_replace("{man_avatars}", $tpl_man_avatars, $page_profile_tpl);

//Женские аватары.
$tpl_wonan_avatars = "";
foreach ($woman_avatars as $woman_avatar){
	$tpl_wonan_avatars .= "<img src='{$tpl_avatar_src}{$woman_avatar['name']}' class='orange' alt='{$woman_avatar['id']}'>";
}
$page_profile_tpl = str_replace("{woman_avatars}", $tpl_wonan_avatars, $page_profile_tpl);

//Пользовательские аватары.
$user_avatars_block_tpl = get_template($page_profile_tpl, "[user_avatars]", "[/user_avatars]");
if (count($user_avatars) < 1){
	$page_profile_tpl = str_replace($user_avatars_block_tpl, "", $page_profile_tpl);
}
else{
	$tpl_user_avatars = "";
	foreach ($user_avatars as $user_avatar){
		$tpl_user_avatars .= "<img src='{$tpl_avatar_src}{$user_avatar['name']}' class='orange' alt='{$user_avatar['id']}'>";
	}
	$page_profile_tpl = str_replace("[user_avatars]", "", $page_profile_tpl);
	$page_profile_tpl = str_replace("[/user_avatars]", "", $page_profile_tpl);
	$page_profile_tpl = str_replace("{user_avatars}", $tpl_user_avatars, $page_profile_tpl);
}

$page_profile_tpl = str_replace("{errors}", $tErrors, $page_profile_tpl);
echo $page_profile_tpl;
?>