<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ("M_MYSQLI.php");

//
//�������� ������ � ���������.
//

class M_News{
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
	//�������� ������� �� ��������������.
	//id - ������������� �������.
	//
	public function Get ($id){
		$id = intval($id);
		$q = "SELECT * FROM casino_news WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//���������� ���������� �������� � ��.
	//
	public function CountNewsInDB (){
		$q = "SELECT COUNT(*) FROM casino_news";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['COUNT(*)'];
	}
	
	//
	//��������� ���������� �������� ������������ �� ����� ��������.
	//
	public function CountNewsInPage(){
		$q = "SELECT newsmain FROM casino_settings";
		$r = $this->_mMysqli->Select($q);
		return $r[0]['newsmain'];
	}
	
	//
	//���������� ������ �������� ��� ������������� �������.
	//start - ��������� �������.
	//count - ���������� ���������.
	//
	public function GetToNavigation($start, $count){
		$q = "SELECT * FROM casino_news ORDER BY id DESC LIMIT {$start},{$count}";
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
}