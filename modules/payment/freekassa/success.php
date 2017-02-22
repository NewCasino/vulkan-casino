<?php
  define("CASINOENGINE", true);
  session_start();
  include_once("../../../engine/config/config.php");
  include_once( "../../../modules/partner/partner.php");
  error_reporting(0);
  
  
  $module_freekassa_query = @mysql_fetch_array(@mysql_query("select * from pay_modules_freekassa"));
  
  $module_payment_fk_secret_key = $module_freekassa_query['mrh_pass2'];
 
  
  $inv_id                 = $_GET['MERCHANT_ORDER_ID'];
  $ik_payment_id		  = $inv_id;
  $ik_payment_amount	  = $_GET['AMOUNT'];
  
  $sign_hash_str = $_GET['MERCHANT_ID'] . ':' .
                 $_GET['AMOUNT'] . ':' .
                 $module_payment_fk_secret_key . ':' .				 
                 $_GET['MERCHANT_ORDER_ID'];
				 
  //$sign_hash = strtoupper(md5($sign_hash_str));
  $sign_hash = md5($sign_hash_str);
  
  
	
	
  
 
  if ( $sign_hash === $_GET['SIGN'] ) {
      $referer = $_SERVER['REMOTE_ADDR'];
      @mysql_query("update pay_deposits set status = '1', referer = '" . $referer . "' where id ='" . $ik_payment_id . "'");
      $pay_query = @mysql_fetch_array(@mysql_query("select * from pay_deposits where id ='" . $ik_payment_id . "'"));
      payToReferer($pay_query['user'], $ik_payment_amount);
      @mysql_query("update clients set cash=cash+'" . $ik_payment_amount . "' where login='" . $pay_query['user'] . "'");
      @mysql_query("update clients set cashin=cashin+'" . $ik_payment_amount . "' where login='" . $pay_query['user'] . "'");
      $config_query  = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site          = $config_query['siteadress'];
      $email_support = $config_query['emailcasino'];
      $priority      = 3;
      $format        = "text/html";
      $msg           = "";
      $msg .= "Здравствуйте, Администратор,<br>";
      $msg .= "Пользователь:" . $pay_query['user'] . "<br><br>";
      $msg .= "Пополнил игровой счёт на: " . $pay_query['amount'] . " Кредитов<br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
      @mail($email_support, "Пополнение счёта на сумму: " . $pay_query['amount'] . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
      $config_query = @mysql_fetch_array(@mysql_query("select * from casino_settings"));
      $site         = $config_query['siteadress'];
      $user_query   = @mysql_fetch_array(@mysql_query("select * from clients where login='" . $pay_query['user'] . "'"));
      $priority     = 3;
      $format       = "text/html";
      $msg          = "";
      $msg .= "Здравствуйте, " . $user_query['login'] . ",<br>";
      $msg .= "<br>";
      $msg .= "Вы Пополнил игровой счёт на: " . $pay_query['amount'] . " Кредитов<br>";
      $msg .= "---------------------<br>";
      $msg .= "С Наилучшими Пожеланиями,<br>";
      $msg .= "Робот Интернет-казино " . $site . "<br>";
	  
	
	  
	  
      @mail($user_query['email'], "Пополнение счёта на сумму: " . $pay_query['amount'] . " Кредитов", $msg, "From: {$email_support}\nContent-Type:{$format};charset=windows-1251\nMIME-Version: 1.0\nContent-Transfer-Encoding: 8bit\nX-Priority: {$priority}\nX-Mailer:CasinoEngine mail v1.0");
  }
  
  
  
 
?>
