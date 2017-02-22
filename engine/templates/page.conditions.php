<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_conditions_tpl = file_get_contents(TEMPLATE_DIR . "/page_conditions.tpl");
  $page_conditions_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_conditions_tpl);
  $page_conditions_tpl = str_replace("{language}", $_SESSION['language'], $page_conditions_tpl);
  $page_conditions_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_conditions_tpl);
  $page_conditions_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_conditions_tpl);
  echo $page_conditions_tpl;
?>