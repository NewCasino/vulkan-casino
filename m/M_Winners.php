<?php
defined ('_Q3TA') or die ('Forbidden');
require_once ('M_MYSQLI.php');

//
//Менеджер работы с победителями.
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
	//Получаем значения настроек победителей.
	//Возвращает установки слайда победителей.
	//
	public function GetSettings (){
		$q = 'SELECT * FROM winners_settings';
		$r = $this->_mMysqli->Select($q);
		return $r[0];
	}
	
	//
	//Устанавливаем значение настроек победителей.
	//$starMoney - стартовое значение выигрыша, отображаемых победителей.
	//$countWinners - количество отображаемых победителей.
	//
	public function SetSettings ($starMoney, $countWinners){
		$errors = array();
		
		if ($starMoney < 1)
			$errors[] = "Настройка выигрыша не может быть меньше 1";
		
		if ($countWinners < 1)
			$errors[] = "Настройка количества выиграшей не может быть меньше 1";
		
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
	//Получить все записи из базы слайдера.
	//
	public function AllList (){
		$q = 'SELECT * FROM winners_list ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//Обновление записей базы слайдера.
	//
	public function UpdateList (){
		//записи в главной статистике
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
	//Удаление записи с списка победителей.
	//$id - идентификатор поля в таблице слайдера
	//Возращает количество удаленных полей.
	//
	public function Delete ($id){
		$id = intval($id);
		$table = 'winners_list';
		$where = 'id="'.$id.'"';
		return $this->_mMysqli->Delete($table, $where);
	}
	
	//
	//Активация(разблокированние) записи победы по идентификатору записи.
	//$id - идентификатор поля в таблице слайдера.
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
	//Деактивация(заблокирование) записи победы по идентификатору записи.
	//$id - идентификатор поля в таблице слайдера.
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
	//Получить только записей для отображения в слайдере из базы слайдера.
	//Записи для отображения в слайдере.
	//
	public function GetWinners (){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE win>='.$settings['start_money'].' AND activity="1" ORDER BY id DESC LIMIT '.$settings['count_winners'].'';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//Получить заблокированые.
	//Записи что заблокированные.
	//
	public function LockedWinners(){
		$q = 'SELECT * FROM winners_list WHERE activity="0" ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//Получить неподходящие.
	//Записи что не подходят по параметрам.
	//
	public function IncompatibleWinners(){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE activity="1" AND win<'.$settings['start_money'].' ORDER BY id DESC';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//Получить остачу от слайдера.
	//Записи что подходят по параметрам, но выходят за лимит показа.
	//
	public function RemnantWinners(){
		$settings = $this->GetSettings();
		$q = 'SELECT * FROM winners_list WHERE win>='.$settings['start_money'].' AND activity="1" ORDER BY id DESC LIMIT '.$settings['count_winners'].', 1000';
		$r = $this->_mMysqli->Select($q);
		return $r;
	}
	
	//
	//Редактирование записи по указанному идентификатору.
	//$id - идентификатор записи победителя.
	//$login - логин игрока
	//$bet - ставка
	//$win - выигрыш
	//$game - название игры
	//
	public function Edit ($id, $login, $bet, $win, $game){
		$errors = array ();
		//Подготовка данных
			$id = intval($id);
			$login = trim($login);
			$bet = intval($bet);
			$win = intval($win);
			$game = trim($game);
		
		//Проверка данных	
		if (strlen($login) < 3 || strlen($login) > 12)
			$errors[] = 'Длинна логина в диапазоне от 3 до 12 символов';
		
		if (empty($game))
			$errors[] = 'Укажите название игры';
		
		if ($bet < 1)
			$errors[] = 'Укажите ставку';
		
		if ($win < 1)
			$errors[] = 'Укажите выигрыш';
		
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
	//Получение записи по ее идентификатору.
	//$id - идентификатор записи победителя.
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
	//Добавление победы.
	//$login - логин игрока
	//$bet - ставка
	//$win - выигрыш
	//$game - название игры
	//
	public function Add ($login, $bet, $win, $game){
		$errors = array ();
		//Подготовка данных
			$login = trim($login);
			$bet = intval($bet);
			$win = intval($win);
			$game = trim($game);
		
		//Проверка данных	
		if (strlen($login) < 3 || strlen($login) > 12)
			$errors[] = 'Длинна логина в диапазоне от 3 до 12 символов';
		
		if (empty($game))
			$errors[] = 'Укажите название игры';
		
		if ($bet < 1)
			$errors[] = 'Укажите ставку';
		
		if ($win < 1)
			$errors[] = 'Укажите выигрыш';
		
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