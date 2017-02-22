<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_contact_tpl = file_get_contents(TEMPLATE_DIR . "/page_contact.tpl");
  $page_contact_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_contact_tpl);
  $page_contact_tpl = str_replace("{language}", $_SESSION['language'], $page_contact_tpl);
  $page_contact_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_contact_tpl);
  $page_contact_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_contact_tpl);
  echo $page_contact_tpl;
?>