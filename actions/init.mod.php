<?php

if ($user->active){
  include('actions/userbox.mod.php');
  include('actions/mainnav.mod.php');
  include('actions/overview.mod.php');
} else {
  $site = file_get_contents('templates/login.tpl.php');
  if (!$site) {
    $answer->setCOM("Error: ".$trans->get('error1000'));
  } else {
    $site = str_replace("{{mandant}}", $trans->get('mandant'), $site);
    $site = str_replace("{{benutzername}}", $trans->get('benutzername'), $site);
    $site = str_replace("{{password}}", $trans->get('password'), $site);
    $site = str_replace("{{clear}}", $trans->get('btnclear'), $site);
    $site = str_replace("{{submit}}", $trans->get('btnlogin'), $site);

    $answer->setSite('add', 'main', $site);
  }
}
?>
