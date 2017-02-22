<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//�������� ��� ��������������� �����.
//

class M_Games{
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

	//
	//��������� ���� ����� ���.
	//
	public function AllGroups(){
		$q = "SELECT * FROM games_group ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� ������ ���.
	//name - �������� ����.
	//
	public function AddGroup($name){
		$errors = array();
		
		$name = trim($name);
		if(empty($name) || strlen($name) > 40)
			$errors [] = '������ �������� ������ ��� �� 40 ��������';
		
		$table = 'games_group';
		$obj = array (
			'name' => $name
		);
		
		if(count($errors)>0)
			return array('status' => 'error', 'errors' => $errors, 'data' => $obj);
			
		$this->_mMysqli->Insert($table, $obj);
		
		return array('status' => 'success');
	}
	
	//
	//�������������� ������ ���.
	//id - ������������� ������.
	//name - �������� ����.
	//
	public function EditGroup($id, $name){
		$errors = array();
		
		$name = trim($name);
		if(empty($name) || strlen($name) > 40)
			$errors [] = '������ �������� ������ ��� �� 40 ��������';
		
		$table = 'games_group';
		$where = "id='{$id}'";
		$obj = array (
			'name' => $name
		);
		
		if(count($errors)>0)
			return array('status' => 'error', 'errors' => $errors, 'data' => $obj);
			
		$this->_mMysqli->Update($table, $obj, $where);
		
		return array('status' => 'success');
	}
	
	//
	//�������� ������ ���.
	//id - ������������� ������.
	//
	public function DeleteGroup($id){
		$id = intval($id);
		$table = 'games_group';
		$where = "id='{$id}'";
		$r = $this->_mMysqli->Delete($table, $where);
		
		if ($r > 0)
			return true;
	}
	
	//
	//��������� ������ ������ ����.
	//id - ������������� ������.
	//
	public function GetGroup($id){
		$id = intval($id);
		$q = "SELECT name FROM games_group WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//������ ��������� �� ���� �����.
	//
	public function AllGamesInfo(){
		$q = "SELECT * FROM games_info ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//��������� ���������� �� ����.
	//id - ������������ ������ ����.
	//
	public function GetGameInfo($id){
		$id = intval($id);
		$q = "SELECT * FROM games_info WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//��������� ���������� �� ����. [get By Link Info]
	//link_info - ������ �� ���������� � ����.
	//
	public function GetGameInfoBLI($link_info){
		$link_info = $this->_mMysqli->RealEscapeString($link_info);
		$q = "SELECT * FROM games_info WHERE link_info='{$link_info}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//URL ���������� �� ���� ��� �����?
	//link_info - ������ �� ���������� �� ����.
	//��������� - id ���� � ������ ������� / false - � ������ ������ �� ������;
	//
	public function URLLinkInfoOccupied($link_info){
		$link_info = $this->_mMysqli->RealEscapeString($link_info);
		$q = "SELECT id FROM games_info WHERE link_info='{$link_info}'";
		$r = $this->_mMysqli->Select($q);
		if(count($r) > 0)
			return $r[0]['id'];
		else
			return false;
	}
	
	//
	//���������� ���������� � ����.
	//name - �������� ����.
	//link_game - ������ �� ����.
	//link_info - ������ �� ���������� �� ����.
	//id_group - ������������� ������ ����.
	//img - ��� �������.
	//description - �������� ����.
	//rules - ������� ����.
	//screenshots - ������ ����������.
	//characteristics - ������ ������������� ����.
	//meta_description - �������� ��� ��.
	//meta_keywords - �������� ����� ��� ��.
	//
	public function AddGameInfo($name, $link_game, $link_info, $id_group, $img, $description, $rules, $screenshots, $characteristics, $meta_description, $meta_keywords){
		$errors = array();
		
		$name = trim($name);
		$link_game = trim($link_game);
		$link_info = trim($link_info);
		$id_group = intval($id_group);
		$img = trim($img);
		$description = trim($description);
		$rules = trim($rules);
		$meta_description = trim($meta_description);
		$meta_keywords = trim($meta_keywords);
		
		$screenshots = serialize($screenshots);
		$characteristics = serialize($characteristics);
		
		//rules bike.
		$tRules = strip_tags($rules);
		$tRules = str_replace('&nbsp;','',$tRules);
		$tRules = trim($tRules);
		if (empty($tRules))
			$rules = '';
		
		if (strlen($name) < 5 || strlen($name) > 50)
			$errors['name'] = '������ ���� 5-50 ��������';
		
		if (strlen($link_game) < 5 || strlen($link_game) > 100)
			$errors['link_game'] = '������ ���� 5-100 ��������';
		
		if (!preg_match("/^[a-z0-9_]{5,50}$/", $link_info))
			$errors['link_info'] = '������ ���� 5-50 ��������, ����������� ������ ��������� ��������';
		else{
			if ($this->URLLinkInfoOccupied($link_info) != false)
				$errors['link_info'] = '������ '.$link_info.' ��� �����.';
		}
		
		if (strlen($meta_keywords) < 5 || strlen($meta_keywords) > 200)
			$errors['meta_keywords'] = '������ ���� 5-200 ��������';
		
		if (strlen($meta_description) < 5 || strlen($meta_description) > 200)
			$errors['meta_description'] = '������ ���� 5-200 ��������';
		
		if ($id_group < 1)
			$errors['id_group'] = '�������� ������ ����';
		
		if(empty($img))
			$errors['img'] = '�������� �������';
		
		$table = 'games_info';
		$obj = array(
			'name' => $name,
			'link_game' => $link_game,
			'link_info' => $link_info,
			'id_group' => $id_group,
			'img' => $img,
			'description' => $description,
			'rules' => $rules,
			'screenshots' => $screenshots,
			'characteristics' => $characteristics,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords
		);
		
		if (count($errors)>0)
			return array('status' => 'error', 'errors' => $errors, 'data' => $obj);
		
		$this->_mMysqli->Insert($table, $obj);
		return array('status' => 'success');
	}
	
	//
	//�������������� ���������� � ����.
	//id - ������������� ������������� ������.
	//name - �������� ����.
	//link_game - ������ �� ����.
	//link_info - ������ �� ���������� �� ����.
	//id_group - ������������� ������ ����.
	//img - ��� �������.
	//description - �������� ����.
	//rules - ������� ����.
	//screenshots - ������ ����������.
	//characteristics - ������ ������������� ����.
	//meta_description - �������� ��� ��.
	//meta_keywords - �������� ����� ��� ��.
	//
	public function EditGameInfo($id, $name, $link_game, $link_info, $id_group, $img, $description, $rules, $screenshots, $characteristics, $meta_description, $meta_keywords){
		$errors = array();
		
		$id = intval($id);
		$name = trim($name);
		$link_game = trim($link_game);
		$link_info = trim($link_info);
		$id_group = intval($id_group);
		$img = trim($img);
		$description = trim($description);
		$rules = trim($rules);
		$meta_description = trim($meta_description);
		$meta_keywords = trim($meta_keywords);
		
		$screenshots = serialize($screenshots);
		$characteristics = serialize($characteristics);
		
		//rules bike.
		$tRules = strip_tags($rules);
		$tRules = str_replace('&nbsp;','',$tRules);
		$tRules = trim($tRules);
		if (empty($tRules))
			$rules = '';
		
		if (strlen($name) < 5 || strlen($name) > 50)
			$errors['name'] = '������ ���� 5-50 ��������';
		
		if (strlen($link_game) < 5 || strlen($link_game) > 100)
			$errors['link_game'] = '������ ���� 5-100 ��������';
		
		if (!preg_match("/^[a-z0-9_]{5,50}$/", $link_info))
			$errors['link_info'] = '������ ���� 5-50 ��������, ����������� ������ ��������� ��������';
		else{
			$tOID = $this->URLLinkInfoOccupied($link_info);
			if ($tOID != false && $tOID != $id)
				$errors['link_info'] = '������ '.$link_info.' ��� �����.';
		}
		
		if (strlen($meta_keywords) < 5 || strlen($meta_keywords) > 200)
			$errors['meta_keywords'] = '������ ���� 5-200 ��������';
		
		if (strlen($meta_description) < 5 || strlen($meta_description) > 200)
			$errors['meta_description'] = '������ ����  5-200 ��������';
		
		if ($id_group < 1)
			$errors['id_group'] = '�������� ������ ����';
		
		if(empty($img))
			$errors['img'] = '�������� �������';
		
		$table = 'games_info';
		$obj = array(
			'name' => $name,
			'link_game' => $link_game,
			'link_info' => $link_info,
			'id_group' => $id_group,
			'img' => $img,
			'description' => $description,
			'rules' => $rules,
			'screenshots' => $screenshots,
			'characteristics' => $characteristics,
			'meta_description' => $meta_description,
			'meta_keywords' => $meta_keywords
		);
		$where = "id='{$id}'";
		
		if (count($errors)>0)
			return array('status' => 'error', 'errors' => $errors, 'data' => $obj);
		
		$this->_mMysqli->Update($table, $obj, $where);
		return array('status' => 'success');
	}
	
	//
	//�������� ���������� �� ����.
	//id - ������������� ������.
	//
	public function DeleteGameInfo($id){
		$id = intval($id);
		$table = 'games_info';
		$where = "id='{$id}'";
		$r = $this->_mMysqli->Delete($table, $where);
		
		if ($r > 0)
			return true;
	}
	
	//
	//���������� ���� �������� ����������.
	//id - ������������� ������.
	//
	public function SetPopular($id){
		$id = intval($id);
		$table = 'games_info';
		$where = "id='{$id}'";
		$obj = array(
			'popular' => '1'
		);
		
		$this->_mMysqli->Update($table, $obj, $where);
		return true;
	}
	
	//
	//����� ���� �������� ����������.
	//id - ������������� ������.
	//
	public function PullOfPopular($id){
		$id = intval($id);
		$table = 'games_info';
		$where = "id='{$id}'";
		$obj = array(
			'popular' => '0'
		);
		
		$this->_mMysqli->Update($table, $obj, $where);
		return true;
	}
	
	//
	//�������� ������ ������� ���������� � ���������� �����.
	//
	public function AllShortPopularInfo(){
		$q = "SELECT id, name, img, link_game, link_info FROM games_info WHERE popular='1' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	//�������� id ������ ���������
		public function CardsGroups(){
		$q = "SELECT * FROM games_group WHERE id='11' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
		//�������� id ������ �������
		public function RouletteGroups(){
		$q = "SELECT * FROM games_group WHERE id='10' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
		//�������� id ������ �����
		public function SlotsGroups(){
		$q = "SELECT * FROM games_group WHERE id='9' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
			//�������� id ������ ��������
		public function JackpotsGroups(){
		$q = "SELECT * FROM games_group WHERE id='12' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
}