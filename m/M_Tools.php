<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//Менеджер для вспомогательных вещей.
//

class M_Tools{
    private static $instance;
	private $_mMysqli;				//Экземпляр драйвера бд.
    private function __clone (){}
	
    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self();            
		
        return self::$instance;
    }
    
    private function __construct (){
		$this->_mMysqli = M_MYSQLI::Instance();
    }

	//Месяцы года с окончанием.
	public $monthsInGrammaticalCase = array (
		1 => "Января",
		2 => "Февраля",
		3 => "Марта",
		4 => "Апреля",
		5 => "Мая",
		6 => "Июня",
		7 => "Июля",
		8 => "Августа",
		9 => "Сентября",
		10 => "Октября",
		11 => "Ноября",
		12 => "Декабря",
	);
	
	//Месяцы года.
	public $months = array (
		1 => "Январь",
		2 => "Февраль",
		3 => "Март",
		4 => "Апрель",
		5 => "Май",
		6 => "Июнь",
		7 => "Июль",
		8 => "Август",
		9 => "Сентябрь",
		10 => "Октябрь",
		11 => "Ноябрь",
		12 => "Декабрь",
	);
	
	//
	//Принимает дату с бд.
	//Возращает год, месяц, день.
	//
	public function DateDbToList($date){
		list($y, $m, $d) = explode("-", $date);
		$y = intval($y);
		$m = intval($m);
		$d = intval($d);
		
		$arr = array (
			'y' => $y,
			'm' => $m,
			'd' => $d
		);
		
		return $arr;
	}
	
	//
	//Преобразование даты, числа, месяца в данные для бд.
	//Год-месяц-число.
	//Возвращает готовую дату.
	//
	public function DateToDbDate($y, $m, $d){
		if (strlen($m) == 1)
			$m = '0'.$m;
		
		if (strlen($d) == 1)
			$d = '0'.$d;
			
		return $y.'-'.$m.'-'.$d;
	}
	
	//
	//Возвращает массив стран.
	//
	public function GetCountries(){
		$q = "SELECT * FROM user_countries";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Возвращает электронный адресс администратора.
	//
	public function GetAdminEmail (){
		$q = "SELECT emailadmin FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['emailadmin'];
	}
	
	//
	//Возвращает электронный адресс администратора.
	//
	public function GetCasinoEmail (){
		$q = "SELECT emailcasino FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['emailcasino'];
	}
	
	//
	//Возвращает адрес сайта.
	//
	public function GetSiteAdress (){
		$q = "SELECT siteadress FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['siteadress'];
	}
	
	//
	//Возвращает значение джекпота.
	//int - привести джекпот к целому числу?.
	//
	public function GetJackpot($int=false){
		$q = "SELECT jp FROM games_jp ORDER BY 'id' ASC";
		$r = $this->_mMysqli->Select($q);
		
		if ($int === true)
			$r[0]['jp'] = intval($r[0]['jp']);	
		
		return $r[0]['jp'];
	}
	
	//
	//Генерирует CID для указанного пользователя.
	//
	public function GenerateCID (){
		$t = 'CASINOSOFT'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
		return md5($t.session_id());
	}
	
	//
	//Регистрационные бонусы.
	//Возвращает массив типа array('fun_reg'=> '', 'bonusreg'=> '').
	//
	public function GetRegistrationBonus(){
		$q = "SELECT fun_reg, bonusreg FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Возвращает id реферала или false, если такого нет.
	//
	public function GetRefererID(){
		if(!isset($_SESSION['ref']))
			return false;
		
		$referer = $this->_mMysqli->RealEscapeString($_SESSION['ref']);
		
		$q = "SELECT id FROM clients WHERE login ='{$referer}'";
		$r = $this->_mMysqli->Select($q);
		
		if (count($r)<1)
			return false;
			
		return $r[0]['id'];
	}
	
	//
	//Обновляет количество реферов по id.
	//id - идентификатор рефера.
	//
	public function UpdateReferersInfo($id){
		$id = intval($id);
		$q = "SELECT registers FROM clients WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		
		$table = "clients";
		$where = "id='{$id}'";
		$obj = array(
			'registers' => $r[0]['registers']+1
		);
		$r = $this->_mMysqli->Update($table, $obj, $where);
		
		if ($r > 0)
			return true;
	}
	
	//
	//Обновляет количество переходов по рефералу.
	//login - логин рефера.
	//
	public function UpdateReferersHitsByLogin($login){
		$login = $this->_mMysqli->RealEscapeString($login);
		$q = "SELECT hits FROM clients WHERE login='{$login}'";
		$r = $this->_mMysqli->Select($q);
		
		$table = "clients";
		$where = "login='{$login}'";
		$obj = array(
			'hits' => $r[0]['hits']+1
		);
		$r = $this->_mMysqli->Update($table, $obj, $where);
		
		if ($r > 0)
			return true;
		
		return false;
	}
	
	//
	//Перевод данных строки в массив.
	//str - строка.
	//
	public function dataToArray($str){
		$arr = array();
		$a_1 = explode(' -;- ', $str);
		$a_2 = array();
		foreach($a_1 as $a_t){
			$a_2[] = explode(' -,- ', $a_t);
		}
		foreach($a_2 as $a_t){
			$arr[$a_t[0]]=$a_t[1];
		}
		return $arr;
	}
}