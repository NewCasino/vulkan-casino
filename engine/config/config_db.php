<?php 
if (!defined('CASINOENGINE'))
	die("��� �������!<script>location.href='/';</script>");

$dbhost = "127.12.120.130"; 					//��� ����� (������ localhost)
$dbuname = "adminH6igLMk"; 			//��� ������������
$dbpass = "mWgytGKwvTpN"; 					//������
$dbname = "vulkan";				//��� ����

if(!defined('_Q3TA'))
	define('_Q3TA', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/m/M_MYSQLI.php');
M_MYSQLI::Instance($dbhost, $dbuname, $dbpass, $dbname);

$site['coding']    = "cp1251";
$site['loc']       = "cp1251_general_ci";

$full_base = @mysql_pconnect($dbhost, $dbuname, $dbpass) or die("<br><br><center><br><br><b>�� ������� ����������� � ���� ������, ���������� ���������� ���������� ������ � �������� ���������.</center></b>");
@mysql_select_db($dbname, $full_base) or die("<br><br><center><br><br><b>����������� ������� ��� ������� ����, ���������� ���������� ���������� ������ � �������� ���������.</center></b>");

@mysql_query("SET NAMES '".$site['coding']."'");
@mysql_query("SET CHARACTER SET '".$site['coding']."'");
@mysql_query("SET @@collation_connection = ".$site['loc']."");
?>
