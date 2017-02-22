<?php
//
//Обработчик страниц.
//
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");

require_once ('m/M_Lotteries.php');
require_once ('m/M_News.php');
require_once ('m/M_Users.php');
$mLotteries = M_Lotteries::Instance();
$mNews = M_News::Instance();
$mUsers = M_Users::Instance();

//Определение нужной нам страницы.
if (!isset($_GET['ppage']) || $_GET['ppage'] == "")
	$page = "index";
else	
	$page = $_GET['ppage'];

$page_filter = preg_match("/^[A-Za-z0-9_=]{2,20}\$/", $page);
	
//Временный велик.
if ($page == 'upload_avatar')
	$needTemplate = false;
else
	$needTemplate = true;

//Переменные упраления шаблоном. [Need Template]
$_NTBottomLotteries = true;
$_NTTopSliders = false;
$_NTAboutCasino = false;

if($page == 'game_info')
	$_NTBottomLotteries = false; 
	
if($page == 'index')
	$_NTTopSliders = true;

if($page == 'index')
	$_NTAboutCasino = true;
	
// Акции.
$arr_lotteries = $mLotteries->All();	// Массив акций.
$count_lotteries = count ($arr_lotteries);
$countLotteriesInBlock = 4;// Количество навигационных кнопок.
$count_pages_lotteries = ceil($count_lotteries/$countLotteriesInBlock);  // Количество странниц.

if (!isAjaxRequest() && $needTemplate == true) {
	$header = file_get_contents(TEMPLATE_DIR . "/header.tpl");
	require_once (ENGINE_DIR . "config/title.php");
	$header = str_replace("{theme}", "/templates/" . $template . "/" .LANGUAGE_SITE, $header);
	
	if ($page == "new") {	// Страничка с новостью.
		$id_new = intval($_GET['new']);
		$news_query = $mNews->Get($id_new);
		if (count($news_query) < 1){
			$header = str_replace("{title}", "Новость не найдена", $header);
			$header = str_replace("{description}", $sitename_query['description'], $header);
			$header = str_replace("{keywords}", $sitename_query['keywords'], $header);
		}
		else{
			$header = str_replace("{title}", $news_query['title'], $header);
			$header = str_replace("{description}", $news_query['descr'], $header);
			$header = str_replace("{keywords}", $news_query['keywords'], $header);
		}
	}
	elseif($page == "news"){ // Страничка с новостями.
		$header = str_replace("{title}", $title, $header);
		$header = str_replace("{description}", $sitename_query['description']." новости", $header);
		$header = str_replace("{keywords}", $sitename_query['keywords'].", новости", $header);
	}
	elseif($page == 'lotteries'){ // Акции.
		$header = str_replace("{title}", $title, $header);
		$header = str_replace("{description}",  $sitename_query['description']." акции", $header);
		$header = str_replace("{keywords}", $sitename_query['keywords'].", акции", $header);
	}
	elseif($page == 'lottery'){	// Страница с акцией.
		$lotteries_query_info = $mLotteries->Get($_GET['lottery']);
		if (count($lotteries_query_info) < 1){
			$header = str_replace("{title}", "Акция не найдена", $header);
			$header = str_replace("{description}", $sitename_query['description'], $header);
			$header = str_replace("{keywords}", $sitename_query['keywords'], $header);
		}
		else{
			$header = str_replace("{title}", $lotteries_query_info['title'], $header);
			$header = str_replace("{description}", $lotteries_query_info['description'], $header);
			$header = str_replace("{keywords}", $lotteries_query_info['keywords'], $header);
		}
	}	
	elseif($page == 'game_info'){// Информация по играм.
		//.htaccess :(
		if (isset($_GET['mode']))
			die("<script type='text/javascript'>location.href='/game_info/{$_GET['mode']}'</script>");
		
		require_once('m/M_Games.php');
		$mGames = M_Games::Instance();
		$game_query = $mGames->GetGameInfoBLI($_GET['link_info']);
		if (count($game_query) < 1){
			$header = str_replace("{title}", "Информация по игре не найдена", $header);
			$header = str_replace("{description}", $sitename_query['description'], $header);
			$header = str_replace("{keywords}", $sitename_query['keywords'], $header);
		}
		else{
			$header = str_replace("{title}", $game_query['name'], $header);
			$header = str_replace("{description}", $game_query['meta_description'], $header);
			$header = str_replace("{keywords}", $game_query['meta_keywords'], $header);
		}
	}
	else {	// Дефолтная страница
		$header = str_replace("{title}", $title, $header);
		$header = str_replace("{description}", $sitename_query['description'], $header);
		$header = str_replace("{keywords}", $sitename_query['keywords'], $header);
	}

	echo $header;
}

//Страница под фильтром.
if ($page_filter == true) {
    $inc = ENGINE_DIR . "/templates/page." . $page . ".php";
	//Контроллер существует.
    if (file_exists($inc)) {
		//Пользователь вошел.
        if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
			$id_session = "CASINOSOFT" . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['HTTP_ACCEPT_CHARSET'];
            $id_session = md5($id_session . session_id());
            if ($_SESSION['sid'] == $id_session) {
                $user_status_query = $mUsers->GetUserStatusByLogin($_SESSION['login']);
				
                if ($user_status_query['status'] != 0) {
					//Подключение шапки сайта.
					if (!isAjaxRequest() && $needTemplate == true) {
	                    include_once(ENGINE_DIR . "/templates/header_nomain.php");
					}
					
					//Подключение контента страницы.
					include_once(ENGINE_DIR . "/templates/page." . $page . ".php");
					
					//Подключение подвала сайта.
					if (!isAjaxRequest() && $needTemplate == true) {
			            include_once(ENGINE_DIR . "/templates/footer_nomain.php");
					}
				}
				else {
                    include_once(ROOT_DIR . "/templates/block.php");
                    session_destroy();
                    exit();
				}
            }
			else {
                $_SESSION['sid']   = "";
                $_SESSION['login'] = "";
                if (DEBUG) {
                    echo "Сессия после входа изменена <script>location.href=\"/\";</script>";
                }
            }
        }
		else {
			if (!isAjaxRequest()  && $needTemplate == true) {
				include_once(ENGINE_DIR . "/templates/header_nomain.php");
			}
            include_once(ENGINE_DIR . "/templates/page." . $page . ".php");
			
			if (!isAjaxRequest()  && $needTemplate == true) {
				include_once(ENGINE_DIR . "/templates/footer_nomain.php");
			}
        }
	}
	else {
			//404.
			include_once(ROOT_DIR . "/templates/404.php");
			exit();
	}
}
else {
	//404.
	include_once(ROOT_DIR . "/templates/404.php");
	exit();
}