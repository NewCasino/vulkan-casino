<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//�������� ������ � ������������.
//

class M_Winners{
	private $_mMysqli;
    private static $instance;
    
    private function __clone (){}

    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self;            
        
        return self::$instance;
    }
    
    private function __construct (){
		$this->_mMysqli = M_MYSQLI::Instance();
    }
	
	//
	//�������� �������� �������� �����������.
	//���������� ��������� ������ �����������.
	//
	public function GetSettings (){
		$q = 'SELECT * FROM winners_settings';
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//������������� �������� �������� �����������.
	//$starMoney - ��������� �������� ��������, ������������ �����������.
	//$countWinners - ���������� ������������ �����������.
	//
	public function SetSettings ($starMoney, $countWinners){
		$errors = array();
		
		if ($starMoney < 1)
			$errors[] = "��������� �������� �� ����� ���� ������ 1";
		
		if ($countWinners < 1)
			$errors[] = "��������� ���������� ��������� �� ����� ���� ������ 1";
		
		if (count($errors)>0)
			return array('status' => false, 'errors' => $errors);
			
		$table = 'winners_settings';
		$where = 'id=1';
		$object = array (
			'start_money' => $starMoney,
			'count_winners' => $countWinners
		);
		$this->_mMysqli->Update($table, $object, $where);
		
		return array('status' => true, 'errors' => $errors);
	}
	
	//
	//�������� ��� ������ �� ���� ��������.
	//
	public function AllList (){
		$q = 'SELECT * FROM winners_list ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//���������� ������� ���� ��������.
	//
	public function UpdateList (){
		//������ � ������� ����������
		$qIDStats = 'SELECT id, bet, win, game, login FROM games_stats WHERE mode="real" AND selected="0"';
		$arrayIdStats = $this->_mMysqli->Select($qIDStats);
		$counter = 0;
		
		if (count ($arrayIdStats) > 0){
			foreach($arrayIdStats as $idStat){
				if($idStat['win'] > $idStat['bet']){
					$table = 'winners_list';
					$obj = array(
						'id_in_stats' => $idStat['id'],
						'bet' => $idStat['bet'],
						'win' => $idStat['win'],
						'game' => $idStat['game'],
						'login' => $idStat['login']
					);
					$r = $this->_mMysqli->Insert($table, $obj);
					
					
					$table = 'games_stats';
					$obj = array(
						'selected' => 1
					);
					$where = "id='{$idStat["id"]}'";
					$this->_mMysqli->Update($table, $obj, $where);
					$counter++;
				}
			}
		}
		return $counter;
	}
	
	//
	//�������� ������ � ������ �����������.
	//$id - ������������� ���� � ������� ��������
	//��������� ���������� ��������� �����.
	//
	public function Delete ($id){
		$id = intval($id);
		$table = 'winners_list';
		$where = 'id="'.$id.'"';
		return $this->_mMysqli->Delete($table, $where);
	}
	
	//
	//���������(����������������) ������ ������ �� �������������� ������.
	//$id - ������������� ���� � ������� ��������.
	//
	public function Activation ($id){
		$id = intval($id);
		$table = 'winners_list';
		$where = 'id="'.$id.'"';
		$object = array (
			'activity' => 1
		);
		$this->_mMysqli->Update($table, $object, $where);
	}
	
	//
	//�����������(��������������) ������ ������ �� �������������� ������.
	//$id - ������������� ���� � ������� ��������.
	//
	public function Deactivation($id){
		$id = intval($id);
		$table = 'winners_list';
		$where = 'id="'.$id.'"';
		$object = array (
			'activity' => 0
		);
		$this->_mMysqli->Update($table, $object, $where);
	}
	
	//
	//�������� ������ ������� ��� ����������� � �������� �� ���� ��������.
	//������ ��� ����������� � ��������.
	//
	public function GetWinners (){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE win>='.$settings['start_money'].' AND activity="1" ORDER BY id DESC LIMIT '.$settings['count_winners'].'';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//�������� ��������������.
	//������ ��� ���������������.
	//
	public function LockedWinners(){
		$q = 'SELECT * FROM winners_list WHERE activity="0" ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//�������� ������������.
	//������ ��� �� �������� �� ����������.
	//
	public function IncompatibleWinners(){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE activity="1" AND win<'.$settings['start_money'].' ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//�������� ������ �� ��������.
	//������ ��� �������� �� ����������, �� ������� �� ����� ������.
	//
	public function RemnantWinners(){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE win>='.$settings['start_money'].' AND activity="1" ORDER BY id DESC LIMIT '.$settings['count_winners'].', 1000';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//�������������� ������ �� ���������� ��������������.
	//$id - ������������� ������ ����������.
	//$login - ����� ������
	//$bet - ������
	//$win - �������
	//$game - �������� ����
	//
	public function Edit ($id, $login, $bet, $win, $game){
		$errors = array ();
		//���������� ������
			$id = intval($id);
			$login = trim($login);
			$bet = intval($bet);
			$win = intval($win);
			$game = trim($game);
		
		//�������� ������	
		if (strlen($login) < 3 || strlen($login) > 12)
			$errors[] = '������ ������ � ��������� �� 3 �� 12 ��������';
		
		if (empty($game))
			$errors[] = '������� �������� ����';
		
		if ($bet < 1)
			$errors[] = '������� ������';
		
		if ($win < 1)
			$errors[] = '������� �������';
		
		$table = 'winners_list';
		$where = 'id="'.$id.'"';
		$object = array (
			'login' => $login,
			'bet' => $bet,
			'win' => $win,
			'game' => $game
		);
		
		if (count($errors)>0)
			return array('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Update($table, $object, $where);
		return array('status' => true, 'errors' => $errors);
	}
	
	//
	//��������� ������ �� �� ��������������.
	//$id - ������������� ������ ����������.
	//
	public function Get ($id){
		$id = intval ($id);
		$q = 'SELECT * FROM winners_list WHERE id="'.$id.'"';
		$r = $this->_mMysqli->Select($q);
		
		if (count($r) < 1)
			return false;
		
		return $r[0];
	}
	
	//
	//���������� ������.
	//$login - ����� ������
	//$bet - ������
	//$win - �������
	//$game - �������� ����
	//
	public function Add ($login, $bet, $win, $game){
		$errors = array ();
		//���������� ������
			$login = trim($login);
			$bet = intval($bet);
			$win = intval($win);
			$game = trim($game);
		
		//�������� ������	
		if (strlen($login) < 3 || strlen($login) > 12)
			$errors[] = '������ ������ � ��������� �� 3 �� 12 ��������';
		
		if (empty($game))
			$errors[] = '������� �������� ����';
		
		if ($bet < 1)
			$errors[] = '������� ������';
		
		if ($win < 1)
			$errors[] = '������� �������';
		
		$table = 'winners_list';
		$object = array (
			'login' => $login,
			'bet' => $bet,
			'win' => $win,
			'game' => $game
		);
		
		if (count($errors)>0)
			return array('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Insert($table, $object);		
		return array('status' => true, 'errors' => $errors);
	}
	
}