<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//�������� ��� ��������������� �����.
//

class M_Tools{
    private static $instance;
	private $_mMysqli;				//��������� �������� ��.
    private function __clone (){}
	
    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self();            
		
        return self::$instance;
    }
    
    private function __construct (){
		$this->_mMysqli = M_MYSQLI::Instance();
    }

	//������ ���� � ����������.
	public $monthsInGrammaticalCase = array (
		1 => "������",
		2 => "�������",
		3 => "�����",
		4 => "������",
		5 => "���",
		6 => "����",
		7 => "����",
		8 => "�������",
		9 => "��������",
		10 => "�������",
		11 => "������",
		12 => "�������",
	);
	
	//������ ����.
	public $months = array (
		1 => "������",
		2 => "�������",
		3 => "����",
		4 => "������",
		5 => "���",
		6 => "����",
		7 => "����",
		8 => "������",
		9 => "��������",
		10 => "�������",
		11 => "������",
		12 => "�������",
	);
	
	//
	//��������� ���� � ��.
	//��������� ���, �����, ����.
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
	//�������������� ����, �����, ������ � ������ ��� ��.
	//���-�����-�����.
	//���������� ������� ����.
	//
	public function DateToDbDate($y, $m, $d){
		if (strlen($m) == 1)
			$m = '0'.$m;
		
		if (strlen($d) == 1)
			$d = '0'.$d;
			
		return $y.'-'.$m.'-'.$d;
	}
	
	//
	//���������� ������ �����.
	//
	public function GetCountries(){
		$q = "SELECT * FROM user_countries";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� ����������� ������ ��������������.
	//
	public function GetAdminEmail (){
		$q = "SELECT emailadmin FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['emailadmin'];
	}
	
	//
	//���������� ����������� ������ ��������������.
	//
	public function GetCasinoEmail (){
		$q = "SELECT emailcasino FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['emailcasino'];
	}
	
	//
	//���������� ����� �����.
	//
	public function GetSiteAdress (){
		$q = "SELECT siteadress FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['siteadress'];
	}
	
	//
	//���������� �������� ��������.
	//int - �������� ������� � ������ �����?.
	//
	public function GetJackpot($int=false){
		$q = "SELECT jp FROM games_jp ORDER BY 'id' ASC";
		$r = $this->_mMysqli->Select($q);
		
		if ($int === true)
			$r[0]['jp'] = intval($r[0]['jp']);	
		
		return $r[0]['jp'];
	}
	
	//
	//���������� CID ��� ���������� ������������.
	//
	public function GenerateCID (){
		$t = 'CASINOSOFT'.$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_ACCEPT_CHARSET'];
		return md5($t.session_id());
	}
	
	//
	//��������������� ������.
	//���������� ������ ���� array('fun_reg'=> '', 'bonusreg'=> '').
	//
	public function GetRegistrationBonus(){
		$q = "SELECT fun_reg, bonusreg FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//���������� id �������� ��� false, ���� ������ ���.
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
	//��������� ���������� ������� �� id.
	//id - ������������� ������.
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
	//��������� ���������� ��������� �� ��������.
	//login - ����� ������.
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
	//������� ������ ������ � ������.
	//str - ������.
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