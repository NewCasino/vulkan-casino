<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');
require_once ('M_Tools.php');

//
//�������� ������ � ��������������.
//

class M_Users{
    private static $instance;
    private function __clone (){}
	private $_mMysqli;				//��������� �������� ��.
	private $_mTools;				//�������� ��� ������ � ������� ������.
	
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
	//���������� ������ ������� ��������.
	//
	public function GetManAvatars(){
		$q = "SELECT id, name FROM user_avatars WHERE gender='man'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� ������ ������� ��������.
	//
	public function GetWomanAvatars(){
		$q = "SELECT id, name FROM user_avatars WHERE gender='woman'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� ������ �������� ������������.
	//id - ������������� ������������.
	//
	public function GetUserAvatars($id){
		$id = intval($id);
		$q = "SELECT id, name FROM user_avatars WHERE id_user='{$id}'";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� �������.
	//id_user - ������������� ������������.
	//id_avatar - ������ ������������.
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
	//���������� ��� �������� �� id ��������.
	//id - ������������� ��������.
	//
	public function GetUserAvatarName($id){
		$id_user = intval ($id);
		$q = "SELECT name FROM user_avatars WHERE id={$id}";
		$a = $this->_mMysqli->Select($q);
		return $a[0]['name'];
	}
	
	//
	//���������� ������ ������������.
	//login - ����� ������������.
	//
	public function GetUserInfoByLogin($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT * FROM clients WHERE login='{$login}' limit 1";		
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//��������� id ������������.
	//login - ����� ������������.
	//
	public function GetUserIdByLogin ($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT id FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['id'];
	}
	
	//
	//���������� ������ � ������� � ��.
	//name - ��� �������.
	//id_user - ������������� ������������.
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
	//��� �����?
	//login - ������ ���������� ����� ������������.
	//����� ������ 3-20 ��������.
	//
	public function IsLogin ($login){
		if (preg_match("/^[A-Za-z0-9]{3,20}$/", $login))
			return true;
		else 
			return false;
	}
	
	//
	//��� ������?
	//password - ������ ���������� ������ ������������.
	//����� ������ 6-20 ��������.
	//
	public function IsPassword($password){
		if (preg_match('/^[A-Za-z0-9]{6,20}$/', $password))
			return true;
		else 
			return false;
	}
	
	//
	//���������� ������ ������������.
	//id_user - ������������� ������������.
	//
	public function GetUserPassowrd($id_user){
		$id_user = intval($id_user);
		
		$q = "SELECT pass FROM clients WHERE id='{$id_user}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['pass'];
	}
	
	//
	//���������� ������ ������������.
	//id_user - ������������� ������������.
	//user_country - ������������� ������ ������������.
	//fio - ��� ������������.
	//number_phone - ����� �������� ������������.
	//birthday_day - ���� ��������.
	//birthday_month - ����� ��������.
	//birthday_year - ��� ��������.
	//gender - 0 �� ������/ 1 - �������/ 2 - �������.
	//icq - icq ������������.
	//skype - skype ������������.
	//new_password - ����� ������.
	//new_password_repeat - �������� ����� ������.
	//retro_password - ������ ������.
	//
	public function UpdateUserInfo($id_user, $user_country, $fio, $number_phone, $birthday_day, $birthday_month, $birthday_year, $gender, $icq, $skype, $new_password, $new_password_repeat, $retro_password){
		//������ ������.
		$errors = array ();
		$updatePassword = false;
		
		//��������� ������.
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
		
		//�������� ������.
		if (strlen($fio) > 0){
			if (!preg_match("/^[a-zA-Z�-��-� ]{5,80}$/",$fio))
				$errors ['fio'] = '���� ��� ������ ��������� ���� ������� � ���������� �����, 5-80 ��������.';
		}
		
		if (strlen($number_phone) > 0){
			if (!preg_match("/^[+]{1}[0-9]{5,20}$/",$number_phone))
				$errors ['phone'] = '���� ����� �������� ������ ��������� �����, 5-20 ��������. ������ +380992966852';
		}
		
		if (strlen($icq) > 0){
			if (!preg_match("/^[0-9]{5,9}$/",$icq))
				$errors ['icq'] = '���� ICQ ������ ��������� ���� �����, 5-9 ��������.';
		}
		
		if (strlen($skype) > 0){
			if (!preg_match("/^[a-zA-Z0-9.-]{5,30}$/",$skype))
				$errors ['skype'] = '���� Skype ������ ��������� ���� ����� � ���������� �����, 5-30 ��������.';
		}
		
		//������.
		if (strlen($new_password)> 0){
			if ($this->IsPassword($new_password) == false)
				$errors ['new_password'] = '���� ����� ������ ������ ��������� ���� ����� � ���������� �����, 6-20 ��������.';
			else{
				if ($this->IsPassword($new_password_repeat) == false)
					$errors ['repeat_password'] = '���� ��������� ������ ������ ��������� ���� ����� � ���������� �����, 6-20 ��������.';
				else{
					if ($new_password != $new_password_repeat)
						$errors ['repeat_password'] = '����� ������ �� �������, ��������� �������.';
					else{
						if ($this->IsPassword($retro_password) == false)
							$errors ['retro_password'] = '������ ������ ������ ��������� ���� ����� � ���������� �����, 6-20 ��������.';
						else{
							if ($this->GetUserPassowrd($id_user) != md5($retro_password))
								$errors ['retro_password'] = '������� ������ ������ ������.';
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
	//���������� ������ ������������.
	//login - ����� ������������.
	//
	public function GetUserStatusByLogin($login){
		if ($this->IsLogin($login) == false)
			die();
		
		$q = "SELECT status FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['status'];
	}
	
	//
	//��������� ���. ������������ �� ��������� ������?
	//network - ��� ���. ����.
	//uid - ������������� ������������ � ��� ����.
	//����������:
	//			����� ���������� ������������ ��� false.
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
	//�������� ����������� ������������.
	//login - ����� ������������.
	//password - ������ ������������.
	//email - ����������� ����� ������������.
	//network - ��� ���� ������������.
	//uid - ������������� � ���. ����.
	//
	public function AddSocial($login, $password, $email, $network, $uid){
		$errors = array();
		
		if ($this->IsLogin($login) == false)
			$errors[] = "�� ���������� �����";
		elseif($this->LoginOccupied($login) == true)
			$errors[] = "����� ��� �����";
		
		if ($this->IsPassword($password) == false)
			$errors[] = "�� ���������� ������";
			
		if ($this->IsEmail($email) == false)
			$errors[] = "�� ���������� �������� �����";
		elseif($this->EmailOccupied($email) == true)
			$errors[] = "�������� ����� ��� �����";
		
		//������ ������.
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
			"admin_notes" => '������� ������',
			"operator_notes" => '������� �����',
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
	//��� email?
	//email - ������ ���������� email.
	//���������� true ���� ��, ��� � �������� �����
	//
	public function IsEmail($email){
		if (preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9]+[a-zA-Z0-9_-]*)+$/', $email))
			return true;
		else 
			return false;
	}
	
	//
	//����� �����?
	//login - ������ ���������� �����.
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
	//Email �����?
	//email - ������ ���������� email.
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