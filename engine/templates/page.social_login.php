<?php
	if (!defined("CASINOENGINE")) {
		exit("Нет доступа!<script>location.href='/';</script>");
	}
	if (!isAjaxRequest()) {
		exit("Нет доступа!<script>location.href='/';</script>");
	}
	include_once(ENGINE_DIR . "forms_process/main_social_login.php");
?>