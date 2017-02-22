<?php

//Досутп тока скрипту
define ( 'CASINOENGINE', true );
//Запускаем сессии
session_start();
//Проверяем на вход и сессию
include_once('../../../engine/core/games/game_secure.php');
?>
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<title>Juicy Fruits</title>

</HEAD>
<BODY leftmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<center>
<OBJECT classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0"WIDTH="100%" HEIGHT="100%" id="index">
	<PARAM NAME="movie" VALUE="index.swf">
	<PARAM NAME="quality"   VALUE="high">
	<PARAM NAME="menu"      VALUE="true">
        <PARAM NAME="allowFullScreen" value="true">
	<EMBED src="index.swf" quality=high FlashVars="l=<? echo $l; ?>" WIDTH="100%" HEIGHT="100%" allowFullScreen="true" NAME="index"
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>
</center>
</BODY></HTML>