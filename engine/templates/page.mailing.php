<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_mailing_tpl = file_get_contents(TEMPLATE_DIR . "/page_mailing.tpl");
  $page_mailing_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_mailing_tpl);
  $page_mailing_tpl = str_replace("{language}", $_SESSION['language'], $page_mailing_tpl);
  $page_mailing_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_mailing_tpl);
  $page_mailing_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_mailing_tpl);
  echo $page_mailing_tpl;
?>