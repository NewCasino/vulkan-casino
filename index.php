<?php
session_start();

define("CASINOENGINE", true);
define ('_Q3TA', true);
define("ROOT_DIR", dirname(__FILE__));

define("ROOT_PATH", dirname(__FILE__) . "/");
define("ENGINE_DIR", ROOT_DIR . "/engine/");

require_once(ENGINE_DIR . "config/config.php");
require_once(ENGINE_DIR . "core/functions.php");
require_once(ENGINE_DIR . "core/mysql_log.php");
require_once(ENGINE_DIR . "core/partner.php");
require_once(ENGINE_DIR . "core/gamemode.php");
require_once(ENGINE_DIR . "core/language.php");
require_once(ENGINE_DIR . "core/online.php");

require_once ('m/M_Tools.php');
require_once ('m/M_Users.php');
$mTools = M_Tools::Instance();
$mUsers = M_Users::Instance();
  
if(isset($_GET['ref']) && !isset($_SESSION['ref']))
	if($mTools->UpdateReferersHitsByLogin($_GET['ref']) === true)
		$_SESSION['ref'] = $_GET['ref'];

define("TEMPLATE_DIR", ROOT_DIR . "/templates/" . $template . "/" . $_SESSION['language']);
define("TEMPLATE", "templates/" . $template . "/" . $_SESSION['language']);
define("LANGUAGE_SITE", $_SESSION['language']);
require_once(ENGINE_DIR . "core/templates.php");
require_once(ENGINE_DIR . "core/page.php"); 

function isAjaxRequest() {
	return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
}
?>