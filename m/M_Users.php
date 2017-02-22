<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');
require_once ('M_Tools.php');

//
//Менеджер работы с пользователями.
//

class M_Users{
    private static $instance;
    private function __clone (){}
	private $_mMysqli;				//Экземпляр драйвера бд.
	private $_mTools;				//Менеджер для работы с мелкими делами.
	
    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self();            
		
        return self::$instance;
    }
    
    private function __construct (){
		$this->_mMysqli = M_MYSQLI::Instance();
		$this->_mTools = M_Tools::Instance();
    }
	
	//
	//Возвращает массив мужских аватаров.
	//
	public function GetManAvatars(){
		$q = "SELECT id, name FROM user_avatars WHERE gender='man'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Возвращает массив женских аватаров.
	//
	public function GetWomanAvatars(){
		$q = "SELECT id, name FROM user_avatars WHERE gender='woman'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Возвращает массив аватарок пользователя.
	//id - идентификатор пользователя.
	//
	public function GetUserAvatars($id){
		$id = intval($id);
		$q = "SELECT id, name FROM user_avatars WHERE id_user='{$id}'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Обновление аватара.
	//id_user - идентификатор пользователя.
	//id_avatar - аватар пользователя.
	//
	public function SetUserAvatar($id_user, $id_avatar){
		$id_user = intval($id_user);
		$id_avatar = intval($id_avatar);
		
		$table = 'clients';
		$object = array(
			'id_avatar' => $id_avatar
		);
		$where = "id='{$id_user}'";
		if($this->_mMysqli->Update($table, $object, $where)>= 0)
			return true;
	}
	
	
	//
	//Возвращает имя аватарки по id картинки.
	//id - идентификатор картинки.
	//
	public function GetUserAvatarName($id){
		$id_user = intval ($id);
		$q = "SELECT name FROM user_avatars WHERE id={$id}";
		$a = $this->_mMysqli->Select($q);
		return $a[0]['name'];
	}
	
	//
	//Возвращает данные пользователя.
	//login - логин пользователя.
	//
	public function GetUserInfoByLogin($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT * FROM clients WHERE login='{$login}' limit 1";		
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Возращает id пользователя.
	//login - логин пользователя.
	//
	public function GetUserIdByLogin ($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT id FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['id'];
	}
	
	//
	//Добавление данных о аватаре в бд.
	//name - имя рисунка.
	//id_user - идентификатор пользователя.
	//
	public function AddAvatar($name, $id_user){
		$id_user = intval($id_user);
		
		$table = "user_avatars";
		$obj = array (
			'name' => $name,
			'id_user' => $id_user
		);
		
		return $this->_mMysqli->Insert($table, $obj);
	}
	
	//
	//Это логин?
	//login - строка содержащая логин пользователя.
	//Длина логина 3-20 символов.
	//
	public function IsLogin ($login){
		if (preg_match("/^[A-Za-z0-9]{3,20}$/", $login))
			return true;
		else 
			return false;
	}
	
	//
	//Это пароль?
	//password - строка содержащая пароль пользователя.
	//Длина пароля 6-20 символов.
	//
	public function IsPassword($password){
		if (preg_match('/^[A-Za-z0-9]{6,20}$/', $password))
			return true;
		else 
			return false;
	}
	
	//
	//Возвращает пароль пользователя.
	//id_user - идентификатор пользователя.
	//
	public function GetUserPassowrd($id_user){
		$id_user = intval($id_user);
		
		$q = "SELECT pass FROM clients WHERE id='{$id_user}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['pass'];
	}
	
	//
	//Обновление данных пользователя.
	//id_user - идентификатор пользователя.
	//user_country - идентификатор страны пользователя.
	//fio - ФИО пользователя.
	//number_phone - номер телефона пользователя.
	//birthday_day - день рождения.
	//birthday_month - месяц рождения.
	//birthday_year - год рождения.
	//gender - 0 не выбран/ 1 - женщина/ 2 - мужщина.
	//icq - icq пользователя.
	//skype - skype пользователя.
	//new_password - новый пароль.
	//new_password_repeat - повторно новый пароль.
	//retro_password - старый пароль.
	//
	public function UpdateUserInfo($id_user, $user_country, $fio, $number_phone, $birthday_day, $birthday_month, $birthday_year, $gender, $icq, $skype, $new_password, $new_password_repeat, $retro_password){
		//Массив ошибок.
		$errors = array ();
		$updatePassword = false;
		
		//Обработка данных.
		$id_user = intval ($id_user);
		$user_country = intval ($user_country);
		$fio = trim ($fio);
		$number_phone = trim ($number_phone);
		$birthday_day = intval($birthday_day);
		$birthday_month = intval($birthday_month);
		$birthday_year = intval($birthday_year);
		$icq = trim($icq);
		$skype = trim($skype);
		$new_password = trim($new_password);
		$new_password_repeat = trim($new_password_repeat);
		$retro_password = trim($retro_password);
		$gender = intval($gender);
		
		//Проверка данных.
		if (strlen($fio) > 0){
			if (!preg_match("/^[a-zA-Zа-яА-Я ]{5,80}$/",$fio))
				$errors ['fio'] = 'Поле ФИО должно содержать лишь русские и английские буквы, 5-80 символов.';
		}
		
		if (strlen($number_phone) > 0){
			if (!preg_match("/^[+]{1}[0-9]{5,20}$/",$number_phone))
				$errors ['phone'] = 'Поле Номер телефона должно содержать цифры, 5-20 символов. Пример +380992966852';
		}
		
		if (strlen($icq) > 0){
			if (!preg_match("/^[0-9]{5,9}$/",$icq))
				$errors ['icq'] = 'Поле ICQ должно содержать лишь цифры, 5-9 символов.';
		}
		
		if (strlen($skype) > 0){
			if (!preg_match("/^[a-zA-Z0-9.-]{5,30}$/",$skype))
				$errors ['skype'] = 'Поле Skype должно содержать лишь цифри и английские буквы, 5-30 символов.';
		}
		
		//Пароли.
		if (strlen($new_password)> 0){
			if ($this->IsPassword($new_password) == false)
				$errors ['new_password'] = 'Поле новый пароль должно содержать лишь цифри и английские буквы, 6-20 символов.';
			else{
				if ($this->IsPassword($new_password_repeat) == false)
					$errors ['repeat_password'] = 'Поле повторите пароль должно содержать лишь цифри и английские буквы, 6-20 символов.';
				else{
					if ($new_password != $new_password_repeat)
						$errors ['repeat_password'] = 'Новые пароли не совпали, повторите попытку.';
					else{
						if ($this->IsPassword($retro_password) == false)
							$errors ['retro_password'] = 'Старый пароль должен содержать лишь цифри и английские буквы, 6-20 символов.';
						else{
							if ($this->GetUserPassowrd($id_user) != md5($retro_password))
								$errors ['retro_password'] = 'Неверно указан старый пароль.';
							else
								$updatePassword = true;
						}
					}
				}
			}	
		}
		
		if (count($errors) > 0){
			$data = array (
				'user_country' => $user_country,
				'fio' => $fio,
				'number_phone' => $number_phone,
				'birthday_day' => $birthday_day,
				'birthday_month' => $birthday_month,
				'birthday_year' => $birthday_year,
				'gender' => $gender,
				'icq' => $icq,
				'skype' => $skype
			);
			return array('status' => false, 'data' => $data, 'errors' => $errors);
		}
		
		$date = $this->_mTools->DateToDbDate($birthday_year, $birthday_month, $birthday_day);
		
		$obj = array (
			'id_country' => $user_country,
			'fio' => $fio,
			'number_phone' => $number_phone,
			'birthday' => $date,
			'icq' => $icq,
			'skype' => $skype,
			'gender' => $gender
		);
		
		if ($updatePassword === true)
			$obj ['pass'] = md5($new_password);
		
		
		$table = 'clients';
		$where = "id='{$id_user}'";
		if($this->_mMysqli->Update($table, $obj, $where)>= 0)
			return array('status' => true);
	}
	
	//
	//Возвращает статус пользователя.
	//login - логин пользователя.
	//
	public function GetUserStatusByLogin($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT status FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['status'];
	}
	
	//
	//Существую соц. пользователь по указанным данным?
	//network - имя соц. сети.
	//uid - идентификатор пользователя в соц сети.
	//Возвращает:
	//			логин совпавшего пользователя или false.
	//
	public function IssetSocialUser($network, $uid){
		$t = "SELECT login FROM clients WHERE social_network='%s' AND social_uid='%s'";
		$q = sprintf($t,
			$this->_mMysqli->RealEscapeString($network),
			$this->_mMysqli->RealEscapeString($uid)
		);
		$r = $this->_mMysqli->Select($q);
		
		if (count($r) == 1)
			return $r[0]['login'];
		
		return false;
	}
	
	//
	//Добавить социального пользователя.
	//login - логин пользователя.
	//password - пароль пользователя.
	//email - электронный адрес пользователя.
	//network - соц сеть пользователя.
	//uid - идентификатор в соц. сети.
	//
	public function AddSocial($login, $password, $email, $network, $uid){
		$errors = array();
		
		if ($this->IsLogin($login) == false)
			$errors[] = "Не корректный логин";
		elseif($this->LoginOccupied($login) == true)
			$errors[] = "Логин уже занят";
		
		if ($this->IsPassword($password) == false)
			$errors[] = "Не корректный пароль";
			
		if ($this->IsEmail($email) == false)
			$errors[] = "Не корректный почтовый адрес";
		elseif($this->EmailOccupied($email) == true)
			$errors[] = "Почтовый адрес уже занят";
		
		//Выдача ошибок.
		if (count($errors) > 0)
			return array('status' => false, 'errors' => $errors);
		
		$bonus = $this->_mTools->GetRegistrationBonus();
		$regFun = $bonus['fun_reg'];
		$regRub = $bonus['bonusreg'];
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$dt = date ("Y-m-d H:i:s");
		
		$refererID = -1;
		if(isset($_SESSION['ref']))
			$refererID = $this->_mTools->GetRefererID();
		
		$table = "clients";
		
		$obj = array(
			"login" => $login,
			"pass" => md5($password),
			"email" => $email,
			"cashfun" => $regFun,
			"cash" => $regRub,
			"ip_reg" => $ip,
			"ip_last" => $ip,
			"date" => $dt,
			"fun_date" => $dt,
			"status" => '1',
			"admin_notes" => 'Заметка Админа',
			"operator_notes" => 'Заметка опера',
			"status_message" => '0',
			"key_reset" => '',
			"referer" => $refererID,
			"social_network" => $network,
			"social_uid" => $uid
		);
		
		$r = $this->_mMysqli->Insert($table, $obj);
		
		if ($refererID > 0)
			$this->_mTools->UpdateReferersInfo($refererID);
		
		return array('status' => true);
	}
	
	//
	//Это email?
	//email - строка содержащая email.
	//Возвращает true если да, нет в обратном случе
	//
	public function IsEmail($email){
		if (preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+$/', $email))
			return true;
		else 
			return false;
	}
	
	//
	//Логин занят?
	//login - строка содержащая логин.
	//true/false
	//
	public function LoginOccupied ($login){
		$login = $this->_mMysqli->RealEscapeString($login);
		$q = "SELECT COUNT(*) FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		if($r[0]['COUNT(*)'] >= 1)
			return true;
		else
			return false;
	}
	
	//
	//Email занят?
	//email - строка содержащая email.
	//true/false
	//
	public function EmailOccupied ($email){
		$email = $this->_mMysqli->RealEscapeString($email);
		$q = "SELECT COUNT(*) FROM clients WHERE email='{$email}'";
		$r = $this->_mMysqli->Select($q);
		if($r[0]['COUNT(*)'] >= 1)
			return true;
		else
			return false;
	}
}