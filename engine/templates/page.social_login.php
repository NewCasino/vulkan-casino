<?php
	if (!defined("CASINOENGINE")) {
		exit("��� �������!<script>location.href='/';</script>");
	}
	if (!isAjaxRequest()) {
		exit("��� �������!<script>location.href='/';</script>");
	}
	include_once(ENGINE_DIR . "forms_process/main_social_login.php");
?>