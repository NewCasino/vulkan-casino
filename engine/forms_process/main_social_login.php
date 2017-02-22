<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) 
	die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Users.php');
require_once ('m/M_Tools.php');
$mUsers = M_Users::Instance ();
$mTools = M_Tools::Instance ();
	
if (isAjaxRequest() && !isset($_SESSION['login'])) {
	if (isset($_POST['uLoginToken'])){
		$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['uLoginToken']. '&host=' . $_SERVER['HTTP_HOST']);
		$user = json_decode($s, true);
		
		if (!isset($user['error']) && (strlen($user['network']) > 1) && (strlen($user['uid']) > 1)){	// Данные получены.
			$loginSocUser = $mUsers->IssetSocialUser($user['network'], $user['uid']);
			if ($loginSocUser !== false){	//Пользователь зарегистрирован.
					$_SESSION['login'] = $loginSocUser;
					$_SESSION['sid'] = $mTools->GenerateCID();
					//Все хорошо пустить пользователя.
					exit(json_encode(array('status' => 2, 'url' => '/' . $_SESSION['language'] . '/games')));
			}
			else{	//Новый пользователь.
				$_SESSION['uLoginInfo'] = $user;
				exit(json_encode(array('status' => 1)));
			}
		}
		else {	// Данные от uLogin не получены.
			exit(json_encode(array('status' => 0)));
		}
	}
	
	if (isset($_SESSION['uLoginInfo']) && !isset($_POST['uLoginToken'])){
		$error = '';	//Ошибки
		
		$rLogin = iconv('utf-8', 'windows-1251', $_POST['socLogin']);
		$rPassword = iconv('utf-8', 'windows-1251', $_POST['socPass']);
		$rEmail = iconv('utf-8', 'windows-1251', $_POST['socEmail']);
		
		if((isset($_POST['socConfirm']) && $_POST['socConfirm'] != 'on') || !isset($_POST['socConfirm']))
			$error .= "Вы не согласились с условиями казино<br />";
		
		$r = $mUsers->AddSocial($rLogin, $rPassword, $rEmail, $_SESSION['uLoginInfo']['network'], $_SESSION['uLoginInfo']['uid']);
		if ($r['status'] == false)
			$error  .= implode('<br/>', $r['errors']);	
		
		if ($r['status'] == true){	//Не произошла ошибка при вставке данных
			$_SESSION['login'] = $rLogin;
			$_SESSION['sid'] = $mTools->GenerateCID();
			
			//Отошлем письмо о регистрации
			$answerFrom = $mTools->GetCasinoEmail();
			$siteadress = $mTools->GetSiteAdress();
			$priority = 3;
			$format="text/html";

			$msg .= 'Здравствуйте, '.$rLogin.',<br>';
			$msg .= 'Данное письмо содержит информацию для доступа к вашему игровому аккаунту:<br>';
			$msg .= '<br>';
			$msg .= 'Логин   : '.htmltext($rLogin).'<br>';
			$msg .= 'Пароль  : '.htmltext($rPassword).'<br>';
			$msg .= '<br>';
			$msg .= '---------------------<br>';
			$msg .= 'С Наилучшими Пожеланиями,<br>';
			$msg .= 'Администрация Интернет-казино '.$siteadress.'<br>';


			mail($rEmail, 'РЕГИСТРАЦИЯ В КАЗИНО', $msg, "From: $answerFrom\nContent-Type:$format;charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: $priority\nX-Mailer:CasinoEngine mail v1.0");
		}
		
		if ($r['status'] == true){	//Ответ со сервера.
			unset($_SESSION['uLoginInfo']);
			exit(json_encode(array('status' => 0, 'url' => '/' . $_SESSION['language'] . '/games')));
		}
		else{
			$error = iconv('windows-1251', 'utf-8', $error);
			exit(json_encode(array('status' => 1, 'message' => $error)));
		}
	}
}
?>