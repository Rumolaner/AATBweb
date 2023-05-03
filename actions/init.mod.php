<?php

$site = file_get_contents('templates/login.tpl.php');
if (!$site) {
  $data['com'][] = "Error: ".$trans->get('error1000');
  $data['AddSite'] = "";
} else {

  $site = str_replace("{{mandant}}", $trans->get('mandant'), $site);
  $site = str_replace("{{benutzername}}", $trans->get('benutzername'), $site);
  $site = str_replace("{{password}}", $trans->get('password'), $site);
  $site = str_replace("{{clear}}", $trans->get('btnclear'), $site);
  $site = str_replace("{{submit}}", $trans->get('btnlogin'), $site);
  $data['AddSite'] = $site;
}

?>
