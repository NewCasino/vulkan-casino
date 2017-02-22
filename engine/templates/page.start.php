<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_start_tpl = file_get_contents(TEMPLATE_DIR . "/page_start.tpl");
  $page_start_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_start_tpl);
  $page_start_tpl = str_replace("{language}", $_SESSION['language'], $page_start_tpl);
  $page_start_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_start_tpl);
  $page_start_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_start_tpl);
  echo $page_start_tpl;
?>