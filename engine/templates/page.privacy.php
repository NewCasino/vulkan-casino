<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_privacy_tpl = file_get_contents(TEMPLATE_DIR . "/page_privacy.tpl");
  $page_privacy_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_privacy_tpl);
  $page_privacy_tpl = str_replace("{language}", $_SESSION['language'], $page_privacy_tpl);
  $page_privacy_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_privacy_tpl);
  $page_privacy_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_privacy_tpl);
  echo $page_privacy_tpl;
?>