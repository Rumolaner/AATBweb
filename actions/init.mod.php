<?php

if ($user->active){
  include('userbox.mod.php');
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
