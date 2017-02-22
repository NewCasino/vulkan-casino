<?php
defined ('_Q3TA') or die ('Forbidden');

//
//Менеджер работы с файлами.
//

class M_Files{
    private static $instance;
    
    private function __clone (){}

    public function Instance(){
        if (self::$instance == null)
            self::$instance = new self;            
        
        return self::$instance;
    }
    
    private function __construct (){
    }
	
	//
	//Получить расширение файла.
	//$fileName - полное имя файла.
	//
	public function GetExtension($fileName){
		$ext = substr($fileName ,strrpos($fileName,'.'),strlen($fileName)-1); 
		if (empty($ext))
			return false;
		
		return $ext;
	}
	
	//
	//Определяет есть расширение рисунком.
	//$extension - расширение файла.
	//
	public function IsImage ($extension){
		$extensions = array(
			'.jpg',
			'.JPG',
			'.gif',
			'.GIF',
			'.bmp',
			'.BMP',
			'.png',	
			'.PNG',
			'.jpeg',
			'.JPEG'
		);
		
		if(in_array($extension, $extensions))
			return true;
		else
			return false;
	}
	
	//
	//Получить имена всех рисунков из указаной папки.
	//dir - папка.
	//
	public function GetImgFromFolder($dir){
		$arr = array ();
		$files = scandir($dir);
		foreach ($files as $file){
			if (strlen($file) > 2)
				if ($this->IsImage($this->GetExtension($file)))
					$arr [] = $file;
		}
		return $arr;
	}
}