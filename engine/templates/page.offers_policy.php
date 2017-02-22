<?php
  if (!defined("CASINOENGINE")) {
      exit("Нет доступа!<script>location.href='/';</script>");
  }
  $page_offers_policy_tpl = file_get_contents(TEMPLATE_DIR . "/page_offers_policy.tpl");
  $page_offers_policy_tpl = str_replace("{theme}", "/templates/" . $template . "/" . $_SESSION['language'], $page_offers_policy_tpl);
  $page_offers_policy_tpl = str_replace("{language}", $_SESSION['language'], $page_offers_policy_tpl);
  $page_offers_policy_tpl = str_replace("{forgot}", "/" . $_SESSION['language'] . "/forgot_password", $page_offers_policy_tpl);
  $page_offers_policy_tpl = str_replace("{support}", "/" . $_SESSION['language'] . "/support", $page_offers_policy_tpl);
  echo $page_offers_policy_tpl;
?>