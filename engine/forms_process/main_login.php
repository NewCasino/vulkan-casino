<?php
//Проверим на доступ
if(!defined('CASINOENGINE')) { die("Нет доступа!<script>location.href='/';</script>"); }

	$логин 	= $_POST['login'];
	$пароль	= $_POST['password'];
	$с_главной = $_POST['send'];
 	$error = '';

	$error = '';
	$логин_фильтер  = preg_match("/^[A-Za-z0-9]{2,20}$/", $логин);
	$пароль_фильтер = preg_match("/^[A-Za-z0-9]{2,20}$/", $пароль);
	$с_главной_фильтер = preg_match("/^[0-9]$/", $с_главной);

	//Если лоини или пароль пустой
    if ( ($логин == '') or ($пароль == '') )
    { 	//Если логин и пароль пустой
    	$error = 'Вы не ввели логин или пароль<br>';
    } else
    {   //Если данные логина и пароля и капчи корректны
    	if ( ($логин_фильтер == true) and ($пароль_фильтер == true))
    	{
    		{
    		//Если всё в норме
    		//Проверям есть ли данные в базе, ошибки не выводим в целях безопасности
    		$result=@mysql_query("select * from clients where login='".filter($логин)."'");
			$row=mysql_fetch_array($result);
			$логин_база=$row['login'];
			$пароль_база=$row['pass'];
			//Если логин и пароль совпал
	    $пароль_md5 = md5($пароль);
            if ( $логин == $логин_база and $пароль_md5 == $пароль_база )
            {
	    		//Дополнительная защите ссесий чтоб не подделали
				$индефикатор_сессии = 'CASINOSOFT' . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['HTTP_ACCEPT_CHARSET'];
				$_SESSION['sid'] = md5($индефикатор_сессии . session_id());
	    		$_SESSION['login']=$логин;
	    		$_SESSION['error'] = '';
	    		$ip = $_SERVER['REMOTE_ADDR'];
	    		//Также запишем ip пользователя по которому он вошел
				@mysql_query("update clients set ip_last = '".$ip."' where login='".$_SESSION['login']."'");
				if (isAjaxRequest()) {
					exit(json_encode(array('status' => 0, 'message' => '', 'url' => '/' . $_SESSION['language'] . '/games')));
				}
	    		echo '<script>location.href="/'.$_SESSION['language'].'/games";</script>';
				exit;
			} else {
				$error .= 'Укажите правильный логин и пароль';
			}
			}
    	}else {
    		//Если данные не корректны
    		$error .= 'Данные не корректны';
    	}
    }

	//Если данныех нет то первый раз загрузили страничку, error = '';
	if ($логин == '' and $пароль == '')
	{ $error = ''; }

	include(ENGINE_DIR."forms/main_login.php");
?>
