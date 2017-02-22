<?php
defined ('_Q3TA') or die ('Forbidden');

//
//Обработчик SQL запросов.
//

class M_MYSQLI{
    private static $instance;
    private $_link; 				//Для работы с бд.
	
    private function __clone (){}

    public function Instance($host = '', $userDb = '', $passDb = '', $nameDb = ''){
        if (self::$instance == null)
            self::$instance = new self($host, $userDb, $passDb, $nameDb);
        
        return self::$instance;
    }
    
	private function __construct ($host, $userDb, $passDb, $nameDb){
		//Подключение к бд.
		$this->_link = new mysqli ($host, $userDb, $passDb, $nameDb);
		if($this->_link->connect_errno)
			die("Не удалось подключится к базе данных, пожалуйста установите корректные данные и обновите страничку.");
		
		$this->_link->set_charset ('cp1251');
	}
	
    //
    //Функция получения данных.
    //$sql текст sql-запрос.
    //
    public function Select($sql){
        $result = $this->_link->query($sql);
        
        if (!$result)
            die($this->_link->error);
        
        $c = $result->num_rows;
		
        $arr = array ();
        
        for ($i = 0; $i < $c; $i++){
            $arr [] = $result->fetch_assoc();
        }
		
		$result->close();
        
        return $arr;
    }
	
	//
	// Вставка строки
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// результат	- идентификатор новой строки
	//
	public function Insert($table, $object){			
		$columns = array();
		$values = array();
	
		foreach ($object as $key => $value){
			$key = $this->_link->real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null){
				$values[] = 'NULL';
			}
			else{
				$value = $this->_link->real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = $this->_link->query($query);
		
		if (!$result)
			die($this->_link->error);
			
		return $this->_link->insert_id;
	}
	
	//
	// Изменение строк
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// $where		- условие (часть SQL запроса)
	// результат	- число измененных строк
	//
	public function Update($table, $object, $where){
		$sets = array();
		foreach ($object as $key => $value){
			$key = $this->_link->real_escape_string($key . '');
			if ($value === null){
				$sets[] = "$key=NULL";			
			}
			else{
				$value = $this->_link->real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = $this->_link->query($query);
		
		
		if (!$result)
			die($this->_link->error);
		
		return $this->_link->affected_rows;
	}
	
	//
	// Удаление строк
	// $table 		- имя таблицы
	// $where		- условие (часть SQL запроса)	
	// результат	- число удаленных строк
	//		
	public function Delete($table, $where){
		$query = "DELETE FROM $table WHERE $where";		
		$result = $this->_link->query($query);
		
		if (!$result)
			die($this->_link->error);

		return $this->_link->affected_rows;	
	}
	
	//
	//Возвращает строку обработанную от SQL-инъекций.
	//$str - строку котрую нужно обезопасить.
	//
	public function RealEscapeString ($str){
		return $this->_link->real_escape_string($str);
	}
}