<?php
defined ('_Q3TA') or die ('Forbidden');
//
//Обработчик SQL запросов.
//

class MYSQL{
    private static $instance;
    
    private function __construct (){}
    private function __clone (){}

    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self;
        
        return self::$instance;
    }
    
    //
    //Функция получения данных.
    //$sql текст sql-запрос.
    //
    public function Select($sql){
        $result = mysql_query ($sql);
        
        if (!$result)
            die(mysql_error());
        
        $c = mysql_num_rows ($result);
        $arr = array ();
        
        for ($i = 0; $i < $c; $i++){
            $arr [] = mysql_fetch_assoc ($result);
        }
        
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
			$key = mysql_real_escape_string($key . '');
			$columns[] = $key;
			
			if ($value === null){
				$values[] = 'NULL';
			}
			else{
				$value = mysql_real_escape_string($value . '');							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = mysql_query($query);
								
		if (!$result)
			die(mysql_error());
			
		return mysql_insert_id();
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
			$key = mysql_real_escape_string($key . '');
			if ($value === null){
				$sets[] = "$key=NULL";			
			}
			else{
				$value = mysql_real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = mysql_query($query);
		
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
	
	//
	// Удаление строк
	// $table 		- имя таблицы
	// $where		- условие (часть SQL запроса)	
	// результат	- число удаленных строк
	//		
	public function Delete($table, $where){
		$query = "DELETE FROM $table WHERE $where";		
		$result = mysql_query($query);
						
		if (!$result)
			die(mysql_error());

		return mysql_affected_rows();	
	}
}