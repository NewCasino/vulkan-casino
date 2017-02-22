<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ("M_MYSQLI.php");

//
//�������� ������ � �������.
//

class M_Lotteries{
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
	//������� ����� �� �� ��������������.
	//$id - ������������� �����.
	//
	public function Delete ($id){
		$id = intval ($id);
		$from = 'casino_lotteries';
		$where = "id_lottery={$id}";
		$this->_mMysqli->Delete($from, $where);
	}
	
	//
	//��������� ���������� ��� �������� ��������.
	//
	public function GetBigSlides (){
		$q = "SELECT id_lottery, img_big FROM casino_lotteries WHERE display_big='1' ORDER BY id_lottery DESC LIMIT 10";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//���������� ����� �����.
	//$title - ��������� �����.
	//$date_start - ���� ������ �����.
	//$date_end - ���� ����� �����.
	//$lottery_short - ������� ��������.
	//$lottery_full - ����� �����.
	//$keywords - ��������� �����.
	//$description - �������� ��� ��.
	//$small_img - ����� �������.
	//$big_img - ������� �������.
	//$need_big - ���������� �������� �������.
	//
	public function Add ($title, $date_start, $date_end, $lottery_short, $lottery_full, $keywords, $description, $small_img, $big_img, $need_big){
		$errors = array ();
		// ���������� ������.
			$id = intval ($id);
			$title = trim($title);
			$date_start = trim($date_start);
			$date_end = trim($date_end);
			$lottery_short = trim(strip_tags($lottery_short));
			$lottery_full = trim($lottery_full);
			$keywords = trim($keywords);
			$description = trim($description);
			$small_img = trim($small_img);
			$big_img = trim($big_img);
			
		//�������� ����� �� ������� �������.
		if ($need_big == 'yes'){
			$need_big = 1;
		}
		else{
			$need_big = 0;
			$big_img = '';
		}
		
		// �������� ������.
			//��������� ������.
				// ��������� �����.
				if (empty($title))
					$errors[] = '�� ��������� �������� �����';
					
				// Keywords.
				if (empty($keywords))
					$errors[] = "�� ��������� ���� Keywords";
				
				// Description.
				if (empty($description))
					$errors[] = '�� ��������� ���� Description';
				
				// ������� ��������.
				if (empty($lottery_short))
					$errors[] = "�� ������� ������� �������� �����";
					
				// ������ ���������� �����.	
				if (empty($lottery_full))
					$errors[] = "�� ������� ������ ��������� �����";
			
			//����		
				// ���� ������ �����.
				if (empty($date_start))
					$errors[] = "�� ������� ���� ������ �����";
				
				// ���� ��������� �����.
				if (empty($date_end))
					$errors[] = "�� ������� ���� ����� �����";
		
			//��������.
				//����� �������.
				if (empty($small_img))
					$errors[] = "�� ������ �������";
				
				//������� �������
				if ($need_big == 1 && empty($big_img))
					$errors[] = "�� ������ ������� �������";
		
		//���������� ������ ��� ��.
		$table = "casino_lotteries";
		$object = array (
			'title' => $title,
			'short_story' => $lottery_short,
			'full_story' => $lottery_full,
			'description' => $description,
			'keywords' => $keywords,
			'img' => $small_img,
			'img_big' => $big_img,
			'display_big' => $need_big,
			'date_start' => $date_start,
			'date_end' => $date_end
		);
		
		//�������� ���� �� ������ � ����������� ������ � ����������� ������ �� ����������.
		if (count($errors) > 0)
			return array ('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Insert($table, $object);
		return array ('status' => true, 'errors' => $errors);
	}
	
	//
	//�������������� ����� �� �� ��������������.
	//$id - ������������� �����.
	//$title - ��������� �����.
	//$date_start - ���� ������ �����.
	//$date_end - ���� ����� �����.
	//$lottery_short - ������� ��������.
	//$lottery_full - ����� �����.
	//$keywords - ��������� �����.
	//$description - �������� ��� ��.
	//$small_img - ����� �������.
	//$big_img - ������� �������.
	//$need_big - ���������� �������� �������.
	//
	public function Edit ($id, $title, $date_start, $date_end, $lottery_short, $lottery_full, $keywords, $description, $small_img, $big_img, $need_big){
		$errors = array ();
		// ���������� ������.
			$id = intval ($id);
			$title = trim($title);
			$date_start = trim($date_start);
			$date_end = trim($date_end);
			$lottery_short = trim(strip_tags($lottery_short));
			$lottery_full = trim($lottery_full);
			$keywords = trim($keywords);
			$description = trim($description);
			$small_img = trim($small_img);
			$big_img = trim($big_img);
			
		//�������� ����� �� ������� �������.
		if ($need_big == 'yes'){
			$need_big = 1;
		}
		else{
			$need_big = 0;
			$big_img = '';
		}
		
		// �������� ������.
			//��������� ������.
				// ��������� �����.
				if (empty($title))
					$errors[] = '�� ��������� �������� �����';
					
				// Keywords.
				if (empty($keywords))
					$errors[] = "�� ��������� ���� Keywords";
				
				// Description.
				if (empty($description))
					$errors[] = '�� ��������� ���� Description';
				
				// ������� ��������.
				if (empty($lottery_short))
					$errors[] = "�� ������� ������� �������� �����";
					
				// ������ ���������� �����.	
				if (empty($lottery_full))
					$errors[] = "�� ������� ������ ��������� �����";
			
			//����		
				// ���� ������ �����.
				if (empty($date_start))
					$errors[] = "�� ������� ���� ������ �����";
				
				// ���� ��������� �����.
				if (empty($date_end))
					$errors[] = "�� ������� ���� ����� �����";
		
			//��������.
				//����� �������.
				if (empty($small_img))
					$errors[] = "�� ������ �������";
				
				//������� �������
				if ($need_big == 1 && empty($big_img))
					$errors[] = "�� ������ ������� �������";
				
		//���������� ������ ��� ��.
		$table = 'casino_lotteries';
		$where = "id_lottery = '{$id}'";
		$object = array (
			'title' => $title,
			'short_story' => $lottery_short,
			'full_story' => $lottery_full,
			'description' => $description,
			'keywords' => $keywords,
			'img' => $small_img,
			'img_big' => $big_img,
			'display_big' => $need_big,
			'date_start' => $date_start,
			'date_end' => $date_end
		);
		
		//�������� ���� �� ������ � ����������� ������ � ����������� ������ �� ����������.
		if (count($errors) > 0)
			return array ('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Update($table, $object, $where);
		return array ('status' => true, 'errors' => $errors);
	}
	
	//
	//�������� ������ ����� �� ��������������.
	//$id - ������������� �����.
	//
	public function Get ($id){
		$id = intval($id);
		$q = "SELECT * FROM casino_lotteries WHERE id_lottery='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//�������� ��� �����.
	//
	public function All(){
		$q = "SELECT * FROM casino_lotteries ORDER BY id_lottery DESC";
		return $this->_mMysqli->Select($q);
	}
}