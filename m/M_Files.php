<?php
defined ('_Q3TA') or die ('Forbidden');

//
//�������� ������ � �������.
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
	//�������� ���������� �����.
	//$fileName - ������ ��� �����.
	//
	public function GetExtension($fileName){
		$ext = substr($fileName ,strrpos($fileName,'.'),strlen($fileName)-1); 
		if (empty($ext))
			return false;
		
		return $ext;
	}
	
	//
	//���������� ���� ���������� ��������.
	//$extension - ���������� �����.
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
	//�������� ����� ���� �������� �� �������� �����.
	//dir - �����.
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