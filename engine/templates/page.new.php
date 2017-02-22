<?php
//
//Контроллер страницы с новостью.
//
if (!defined("CASINOENGINE"))
	die("Нет доступа!<script>location.href='/';</script>");
	
require_once ('m/M_News.php');
$mNews = M_News::Instance();
	
$id_new = intval($_GET['new']);
$news_query = $mNews->Get($id_new);

if (count($news_query) > 0) {
	$news_tpl   = file_get_contents(TEMPLATE_DIR . "/page_new.tpl");
	$news_tpl   = str_replace("{date}", $news_query['date'], $news_tpl);
	$news_tpl   = str_replace("{title}", $news_query['title'], $news_tpl);
	$news_tpl   = str_replace("{full_story}", $news_query['full_story'], $news_tpl);
	echo $news_tpl;
}
else {
	echo "<p style='text-align: center; padding: 0px 0px 35px; 0px;'>Статья не найдена!</p>";
}
?>