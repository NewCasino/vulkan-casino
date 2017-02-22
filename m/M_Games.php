<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//Менеджер для вспомогательных вещей.
//

class M_Games{
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

	//
	//Получения всех групп игр.
	//
	public function AllGroups(){
		$q = "SELECT * FROM games_group ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Добавление группы игр.
	//name - название игры.
	//
	public function AddGroup($name){
		$errors = array();
		
		$name = trim($name);
		if(empty($name) || strlen($name) > 40)
			$errors [] = 'Длинна названия группы игр до 40 символов';
		
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
	//Редактирование группы игр.
	//id - идентификатор записи.
	//name - название игры.
	//
	public function EditGroup($id, $name){
		$errors = array();
		
		$name = trim($name);
		if(empty($name) || strlen($name) > 40)
			$errors [] = 'Длинна названия группы игр до 40 символов';
		
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
	//Удаление группы игр.
	//id - идентификатор записи.
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
	//Получения данных группы игры.
	//id - идентификатор записи.
	//
	public function GetGroup($id){
		$id = intval($id);
		$q = "SELECT name FROM games_group WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Массив инфомации по всем играм.
	//
	public function AllGamesInfo(){
		$q = "SELECT * FROM games_info ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	
	//
	//Получение информации по игре.
	//id - иденификатор записи игры.
	//
	public function GetGameInfo($id){
		$id = intval($id);
		$q = "SELECT * FROM games_info WHERE id='{$id}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Получение информации по игре. [get By Link Info]
	//link_info - ссылка на информацию о игре.
	//
	public function GetGameInfoBLI($link_info){
		$link_info = $this->_mMysqli->RealEscapeString($link_info);
		$q = "SELECT * FROM games_info WHERE link_info='{$link_info}'";
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//URL информации по игре уже занят?
	//link_info - ссылка на информацию по игре.
	//результат - id игры с данной ссылкой / false - в случае ссылка не занята;
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
	//Добавление информации о игре.
	//name - название игры.
	//link_game - ссылка на игру.
	//link_info - ссылка на информацию по игре.
	//id_group - идентификатор группы игры.
	//img - имя рисунка.
	//description - описание игры.
	//rules - правила игры.
	//screenshots - массив скриншотов.
	//characteristics - массив характеристик игры.
	//meta_description - описания для ПС.
	//meta_keywords - ключевые слова для ПС.
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
			$errors['name'] = 'Длинна поля 5-50 символов';
		
		if (strlen($link_game) < 5 || strlen($link_game) > 100)
			$errors['link_game'] = 'Длинна поля 5-100 символов';
		
		if (!preg_match("/^[a-z0-9_]{5,50}$/", $link_info))
			$errors['link_info'] = 'Длинна поля 5-50 символов, используйте только латинских символов';
		else{
			if ($this->URLLinkInfoOccupied($link_info) != false)
				$errors['link_info'] = 'Адресс '.$link_info.' уже занят.';
		}
		
		if (strlen($meta_keywords) < 5 || strlen($meta_keywords) > 200)
			$errors['meta_keywords'] = 'Длинна поля 5-200 символов';
		
		if (strlen($meta_description) < 5 || strlen($meta_description) > 200)
			$errors['meta_description'] = 'Длинна поля 5-200 символов';
		
		if ($id_group < 1)
			$errors['id_group'] = 'Выберите группу игры';
		
		if(empty($img))
			$errors['img'] = 'Выберите рисунок';
		
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
	//Редактирование информации о игре.
	//id - идентификатор редактируемой записи.
	//name - название игры.
	//link_game - ссылка на игру.
	//link_info - ссылка на информацию по игре.
	//id_group - идентификатор группы игры.
	//img - имя рисунка.
	//description - описание игры.
	//rules - правила игры.
	//screenshots - массив скриншотов.
	//characteristics - массив характеристик игры.
	//meta_description - описания для ПС.
	//meta_keywords - ключевые слова для ПС.
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
			$errors['name'] = 'Длинна поля 5-50 символов';
		
		if (strlen($link_game) < 5 || strlen($link_game) > 100)
			$errors['link_game'] = 'Длинна поля 5-100 символов';
		
		if (!preg_match("/^[a-z0-9_]{5,50}$/", $link_info))
			$errors['link_info'] = 'Длинна поля 5-50 символов, используйте только латинских символов';
		else{
			$tOID = $this->URLLinkInfoOccupied($link_info);
			if ($tOID != false && $tOID != $id)
				$errors['link_info'] = 'Адресс '.$link_info.' уже занят.';
		}
		
		if (strlen($meta_keywords) < 5 || strlen($meta_keywords) > 200)
			$errors['meta_keywords'] = 'Длинна поля 5-200 символов';
		
		if (strlen($meta_description) < 5 || strlen($meta_description) > 200)
			$errors['meta_description'] = 'Длинна поля  5-200 символов';
		
		if ($id_group < 1)
			$errors['id_group'] = 'Выберите группу игры';
		
		if(empty($img))
			$errors['img'] = 'Выберите рисунок';
		
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
	//Удаление информации по игре.
	//id - идентификатор записи.
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
	//Установить игре значение популярной.
	//id - идентификатор записи.
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
	//Снять игре значение популярной.
	//id - идентификатор записи.
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
	//Получить массив краткой информации о популярных играх.
	//
	public function AllShortPopularInfo(){
		$q = "SELECT id, name, img, link_game, link_info FROM games_info WHERE popular='1' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
	//Получить id группы карточные
		public function CardsGroups(){
		$q = "SELECT * FROM games_group WHERE id='11' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
		//Получить id группы рулетки
		public function RouletteGroups(){
		$q = "SELECT * FROM games_group WHERE id='10' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
		//Получить id группы слоты
		public function SlotsGroups(){
		$q = "SELECT * FROM games_group WHERE id='9' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
			//Получить id группы джекпоты
		public function JackpotsGroups(){
		$q = "SELECT * FROM games_group WHERE id='12' ORDER BY id DESC";
		return $this->_mMysqli->Select($q);
	}
}