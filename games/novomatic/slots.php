<?

//Досутп тока скрипту
define ( 'CASINOENGINE', true );
//Запускаем сессии
session_start();
//Проверяем на вход и сессию
include_once('../../engine/core/games/game_secure.php');
//Подключаем базу
include_once('../../engine/config/config.php');
//Подключаем основные функции
include_once('../../engine/core/games/game_functions.php');
include_once('../../engine/core/games/jackpots.php');

define( 'ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);


//error_reporting(E_ALL ^ E_NOTICE);

//База игр и настроек
$settings_game = array("attila" => array("bet" => "900","lines" => "9","betall" => "900"),
					 "ramsesII" => array("bet" => "900","lines" => "9","betall" => "900"),
		 	    "aztectreasure" => array("bet" => "900","lines" => "9","betall" => "900"),
				  "kingofcards" => array("bet" => "900","lines" => "9","betall" => "900")
);

$login = $_SESSION['login'];
$mode  = $_SESSION['mode'];

//Прочитаем данные
$action = $_POST['action'];
$bet = $_POST['bet'];
$betline = $_POST['betline'];
$lines = $_POST['lines'];
$game = $_POST['game'];
$betall = $lines * $betline;

//Инициализируем переменные
$error = '';

$game = preg_replace("/[^a-zA-Z]/i", "", substr($game,0,50));  
//!!!!! Тут проверяем в базе есть ли вообще такая игра - нет, блокируем пишем в лог


//От валлюты и счёт пользователя
if ( $action == "state" )
{
	//Сброс инициализируем все данные скрипта - особенно сесии
	//!!!!!
	$_SESSION['freegame_number'] = 0;
    $_SESSION['freegame_win'] = 0; 
    
	//$user_balance = get_client_balance($_SESSION['login']);
	if ($mode == 'wmr') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cash']; }
	if ($mode == 'fun') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cashfun']; }
	$user_balance = floor($user_balance);  
    
  	echo "result=ok&state=0&min=1&id={$login}&balance={$user_balance}";
  	//Поставим флаг что инициализция прошла успещно
  	$_SESSION['state_ok'] = 1; 
}



//Обработаем входящие данные, подключим логику
if ( $action == "spin" or $action == "finish" or $action == "double" or $action == "freegame") {
if ( $_SESSION['state_ok'] == 1 ) {	
	//Берём баланс пользователя для проверки
	if ($mode == 'wmr') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cash']; }
	if ($mode == 'fun') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cashfun']; }
	$user_balance = floor($user_balance); 
	if ($action != "finish")  {
    if ( $betall > $user_balance )
    {
		@log_reporting('В игре: '.$game.' игрок: '.$login.' хочет поставить ставку: bet:'.$bet.' betall:'.$betall.' больше его баланса'.$user_balance, 1);
	    $error = "error|error";        
    } }
	if ( $bet < 0 || $bet > 900  )
	{
		@log_reporting('В игре: '.$game.' игрок: '.$login.' хочет поставить недопустимую ставку:'.$bet, 1);
	    $error = "error|error";	    
	}
	if ( $lines < 1 and $lines > 9 )
	{
		@log_reporting('В игре: '.$game.' игрок: '.$login.' хочет поставить недопустимую линию:'.$lines, 1);	
		$error = "error|error";
	}
	if ( $user_balance < 0 )
	{
		@log_reporting('В игре: '.$game.' у игрока: '.$login.' баланс ушел в минус:'.$lines, 0);	
	    $user_balance = 0;     
		$error = "error|error";
	}		
	//Если ошибка, выводим в браузер и прекращаем любые действия
	if 	( $error != "" ) { 
		echo $error;
		//Сбросим сессии
		$_SESSION['state_ok'] = 0;
		die; 
	}
	

	
	//Подключаем логику игр
	//15 призовых x 3
	if ( $game == "attila" )			{ include ( ROOT_DIR."/games/novomatic/logic_attila.php" ); }
	if ( $game == "aztectreasure" ) 	{ include ( ROOT_DIR."/games/novomatic/logic_aztectreasure.php" ); }
	if ( $game == "dolphins" ) 			{ include ( ROOT_DIR."/games/novomatic/logic_dolphins.php" ); }	
	if ( $game == "kingofcards" ) 		{ include ( ROOT_DIR."/games/novomatic/logic_kingofcards.php" ); }
	if ( $game == "luckylady" ) 		{ include ( ROOT_DIR."/games/novomatic/logic_luckylady.php" ); }
	if ( $game == "moneygame" ) 		{ include ( ROOT_DIR."/games/novomatic/logic_moneygame.php" ); }		
	if ( $game == "wonderful" ) 	    { include ( ROOT_DIR."/games/novomatic/logic_wonderfulflute.php" ); }
	if ( $game == "ramsesII" ) 			{ include ( ROOT_DIR."/games/novomatic/logic_ramsesII.php" ); }
	if ( $game == "unicorn" ) 			{ include ( ROOT_DIR."/games/novomatic/logic_unicorn.php" ); }
	if ( $game == "secretforest" ) 		{ include ( ROOT_DIR."/games/novomatic/logic_secretforest.php" ); }

	// = 10
	
	//columbus - 10 призовых, скаттер не умножает
	//columbusdelux  - 10 призовых, скаттер не умножает
	//markopolo - 10 призовых, скаттер не умножает
	if ( $game == "columbus" ) 			{ include ( ROOT_DIR."/games/novomatic/logic_columbus.php" ); }
	if ( $game == "columbusdelux" ) 	{ include ( ROOT_DIR."/games/novomatic/logic_columbusdelux.php" ); }
	if ( $game == "markopolo" ) 		{ include ( ROOT_DIR."/games/novomatic/logic_markopolo.php" ); }	
	
 	//13 Игр
	if ( $game == "bananas" ) 			{ include ( ROOT_DIR."/games/novomatic/logic_bananas.php" ); }
	if ( $game == "bananasplash")		{ include ( ROOT_DIR."/games/novomatic/logic_bananasplash.php" ); }
	if ( $game == "bookofra")			{ include ( ROOT_DIR."/games/novomatic/logic_bookofra.php" ); }
	if ( $game == "dynasty")			{ include ( ROOT_DIR."/games/novomatic/logic_dynasty.php" ); }
	if ( $game == "goldenplanet")		{ include ( ROOT_DIR."/games/novomatic/logic_goldenplanet.php" ); }
	
	if ( $game == "gryphonsgold")		{ include ( ROOT_DIR."/games/novomatic/logic_gryphonsgold.php" ); }
	if ( $game == "magicprincess")		{ include ( ROOT_DIR."/games/novomatic/logic_magicprincess.php" ); }
	if ( $game == "mermaidspearl")		{ include ( ROOT_DIR."/games/novomatic/logic_mermaidspearl.php" ); }
	if ( $game == "panteron")			{ include ( ROOT_DIR."/games/novomatic/logic_panteron.php" ); }
	if ( $game == "pharaohsgoldll")		{ include ( ROOT_DIR."/games/novomatic/logic_pharaohsgoldll.php" ); }
	if ( $game == "pharaohsgoldlll")	{ include ( ROOT_DIR."/games/novomatic/logic_pharaohsgoldlll.php" ); }	
	if ( $game == "polarfox")			{ include ( ROOT_DIR."/games/novomatic/logic_polarfox.php" ); }
	if ( $game == "queenof")			{ include ( ROOT_DIR."/games/novomatic/logic_queenof.php" ); }
	if ( $game == "royaltreasures")		{ include ( ROOT_DIR."/games/novomatic/logic_royaltreasures.php" ); }
	if ( $game == "safariheat")			{ include ( ROOT_DIR."/games/novomatic/logic_safariheat.php" ); }		
	if ( $game == "sharky")				{ include ( ROOT_DIR."/games/novomatic/logic_sharky.php" ); }
	if ( $game == "sparta")				{ include ( ROOT_DIR."/games/novomatic/logic_sparta.php" ); }					
		
} else { 
	@log_reporting('В игре: '.$game.' игрок: '.$login.' хочет запустить игру без инициализации', 1);
	die;
}
}

?>