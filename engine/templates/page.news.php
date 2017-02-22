<?php
//
//���������� �������� � ���������.
//
if (!defined("CASINOENGINE"))
	die("��� �������!<script>location.href='/';</script>");

//������������ ���������.
if(!isset($_GET['page']))
	$_GET['page'] = null;
	
require_once ('m/M_News.php');
$mNews = M_News::Instance();
	
$countNews = $mNews->CountNewsInDB();	//���������� ��������.
$countNewsInPage = $mNews->CountNewsInPage();	//���������� �������� ��� ����������� �� ����� ��������.
	
$countPages = intval(($countNews - 1)/$countNewsInPage) + 1;	//��������� �������.	
$pageNavigation = intval($_GET['page']);	//����� ��������.
	
//������.
if ($pageNavigation <= 0)
	$pageNavigation = 1;
if ($pageNavigation > $countPages)
	$pageNavigation = $countPages;
	
	
$startSelect = $pageNavigation*$countNewsInPage - $countNewsInPage; //���������� �������.
$navigationArray = array ();	
// ��������� ����.
// next/back - ����� ������ ����� �� ���
// pages - ����� ������� ������
// page - ������� ��������
if ($pageNavigation > 1) 
	$navigationArray['back'] = $pageNavigation-1; 

if($pageNavigation - 2 > 0)
	$navigationArray[1] = 1; 

if($pageNavigation - 3 > 0)
	$navigationArray['points-b'] = '..'; 	
	
if($pageNavigation - 1 > 0) 
	$navigationArray[2] = $pageNavigation - 1; 
//
	$navigationArray['page'] = $pageNavigation;
//
if($pageNavigation + 1 <= $countPages) 
	$navigationArray[3] = $pageNavigation + 1;

if($pageNavigation + 3 <= $countPages)
	$navigationArray['points-n'] = '..'; 

if($pageNavigation + 2 <= $countPages) 
	$navigationArray[4] = $countPages;

if ($pageNavigation != $countPages) 
	$navigationArray['next'] = $pageNavigation+1;

$newsNavigation = '';
	
foreach($navigationArray as $k=>$nav){
	if ($k == 'back')//������� �����
		$newsNavigation .= "<span><a class='back' href='/ru/news/&page={$nav}'><img src='/".TEMPLATE."/images/left-nav.png'></a></span>";
	elseif ($k == 'next')//������� ������
		$newsNavigation .= "<span><a class='next' href='/ru/news/&page={$nav}'><img src='/".TEMPLATE."/images/right-nav.png'></a></span>";	
	elseif ($k == 'points-b' || $k == 'points-n')
		$newsNavigation .= '<span>'.$nav.'</span>';											//�����
	elseif ( $k == 'page')
		$newsNavigation .= '<span class="selected">'.$nav.'</span>';							//������� ��������
	else
		$newsNavigation .= "<span><a href='/ru/news/&page={$nav}'>{$nav}</a></span>";			//������� �����
}

if ($countNews > 0) {
	$news_tpl = file_get_contents(TEMPLATE_DIR . "/page_news.tpl");
	$news_query = $mNews->GetToNavigation($startSelect, $countNewsInPage);
	
	$content_news = "";
	foreach($news_query as $news) {
		$header_short_story = get_template($news_tpl, "[short_story]", "[/short_story]");
		$header_short_story = str_replace("[short_story]", "", $header_short_story);
		$header_short_story = str_replace("[/short_story]", "", $header_short_story);
		
		$header_short_story = str_replace("{short_story}", $news['short_story'], $header_short_story);
		$header_short_story = str_replace("{date}", $news['date'], $header_short_story);
		$header_short_story = str_replace("{title}", $news['title'], $header_short_story);
		$header_short_story = str_replace("{full_story_link}", "/new/" . $news['id'], $header_short_story);
		$content_news .= $header_short_story;
	}
	
	//
	$header_short_story = get_template($news_tpl, "[short_story]", "[/short_story]");
	$news_tpl = str_replace($header_short_story, '', $news_tpl);//*
	//
	
	$news_tpl = str_replace("{content_news}", $content_news, $news_tpl);//*
	$news_tpl = str_replace("{news_navigation}", $newsNavigation, $news_tpl);//*
	
	echo $news_tpl;
}
else {
	echo "<p style='text-align: center; padding: 0px 0px 35px; 0px;'>�������� ���!</p>";
}
?>