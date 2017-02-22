<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ("M_MYSQLI.php");

//
//Менеджер работы с акциями.
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
	//Удалить акцию по ее идентификатору.
	//$id - идентификатор акции.
	//
	public function Delete ($id){
		$id = intval ($id);
		$from = 'casino_lotteries';
		$where = "id_lottery={$id}";
		$this->_mMysqli->Delete($from, $where);
	}
	
	//
	//Получение информации для большого слайдера.
	//
	public function GetBigSlides (){
		$q = "SELECT id_lottery, img_big FROM casino_lotteries WHERE display_big='1' ORDER BY id_lottery DESC LIMIT 10";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Добавление новой акции.
	//$title - заголовок акции.
	//$date_start - день старта акции.
	//$date_end - день конца акции.
	//$lottery_short - краткое описание.
	//$lottery_full - текст акции.
	//$keywords - ключевики акции.
	//$description - описание для пс.
	//$small_img - малый рисунок.
	//$big_img - большой рисунок.
	//$need_big - надобность большого рисунка.
	//
	public function Add ($title, $date_start, $date_end, $lottery_short, $lottery_full, $keywords, $description, $small_img, $big_img, $need_big){
		$errors = array ();
		// Подготовка данных.
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
			
		//Проверка нужен ли большой рисунок.
		if ($need_big == 'yes'){
			$need_big = 1;
		}
		else{
			$need_big = 0;
			$big_img = '';
		}
		
		// Проверка данных.
			//Текстовые данные.
				// Заголовок акции.
				if (empty($title))
					$errors[] = 'Не заполнено название акции';
					
				// Keywords.
				if (empty($keywords))
					$errors[] = "Не заполнено поле Keywords";
				
				// Description.
				if (empty($description))
					$errors[] = 'Не заполнено поле Description';
				
				// Краткое описание.
				if (empty($lottery_short))
					$errors[] = "Не введено краткое описание акции";
					
				// Полное содержимое акции.	
				if (empty($lottery_full))
					$errors[] = "Не введено полное описанние акции";
			
			//Даты		
				// Дата старта акции.
				if (empty($date_start))
					$errors[] = "Не введена дата старта акции";
				
				// Дата окончания акции.
				if (empty($date_end))
					$errors[] = "Не введена дата конца акции";
		
			//Рисуноки.
				//Малый рисунок.
				if (empty($small_img))
					$errors[] = "Не выбран рисунок";
				
				//Большой рисунок
				if ($need_big == 1 && empty($big_img))
					$errors[] = "Не выбран большой рисунок";
		
		//Подготовка данных для бд.
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
		
		//Проверка нету ли ошибки в заполненных данных и возвращение данных по надобности.
		if (count($errors) > 0)
			return array ('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Insert($table, $object);
		return array ('status' => true, 'errors' => $errors);
	}
	
	//
	//Редактирование акции по ее идентификатору.
	//$id - идентификатор акции.
	//$title - заголовок акции.
	//$date_start - день старта акции.
	//$date_end - день конца акции.
	//$lottery_short - краткое описание.
	//$lottery_full - текст акции.
	//$keywords - ключевики акции.
	//$description - описание для пс.
	//$small_img - малый рисунок.
	//$big_img - большой рисунок.
	//$need_big - надобность большого рисунка.
	//
	public function Edit ($id, $title, $date_start, $date_end, $lottery_short, $lottery_full, $keywords, $description, $small_img, $big_img, $need_big){
		$errors = array ();
		// Подготовка данных.
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
			
		//Проверка нужен ли большой рисунок.
		if ($need_big == 'yes'){
			$need_big = 1;
		}
		else{
			$need_big = 0;
			$big_img = '';
		}
		
		// Проверка данных.
			//Текстовые данные.
				// Заголовок акции.
				if (empty($title))
					$errors[] = 'Не заполнено название акции';
					
				// Keywords.
				if (empty($keywords))
					$errors[] = "Не заполнено поле Keywords";
				
				// Description.
				if (empty($description))
					$errors[] = 'Не заполнено поле Description';
				
				// Краткое описание.
				if (empty($lottery_short))
					$errors[] = "Не введено краткое описание акции";
					
				// Полное содержимое акции.	
				if (empty($lottery_full))
					$errors[] = "Не введено полное описанние акции";
			
			//Даты		
				// Дата старта акции.
				if (empty($date_start))
					$errors[] = "Не введена дата старта акции";
				
				// Дата окончания акции.
				if (empty($date_end))
					$errors[] = "Не введена дата конца акции";
		
			//Рисуноки.
				//Малый рисунок.
				if (empty($small_img))
					$errors[] = "Не выбран рисунок";
				
				//Большой рисунок
				if ($need_big == 1 && empty($big_img))
					$errors[] = "Не выбран большой рисунок";
				
		//Подготовка данных для бд.
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
		
		//Проверка нету ли ошибки в заполненных данных и возвращение данных по надобности.
		if (count($errors) > 0)
			return array ('status' => false, 'errors' => $errors, 'data' => $object);
		
		$this->_mMysqli->Update($table, $object, $where);
		return array ('status' => true, 'errors' => $errors);
	}
	
	//
	//Получить данные акции по идентификатору.
	//$id - идентификатор акции.
	//
	public function Get ($id){
		$id = intval($id);
		$q = "SELECT * FROM casino_lotteries WHERE id_lottery='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Получить все акции.
	//
	public function All(){
		$q = "SELECT * FROM casino_lotteries ORDER BY id_lottery DESC";
		return $this->_mMysqli->Select($q);
	}
}