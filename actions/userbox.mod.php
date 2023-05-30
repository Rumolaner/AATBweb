<?php

$ub = file_get_contents('templates/userbox.tpl.php');
if (!$ub) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {

  $ub = str_replace("{{mandant}}", $trans->get('mandant'), $ub);
  $ub = str_replace("{{benutzername}}", $trans->get('benutzername'), $ub);
  $ub = str_replace("{{btnlogout}}", $trans->get('btnlogout'), $ub);

  $ub = str_replace("{{mandant_value}}", $user->mandant->name, $ub);
  $ub = str_replace("{{benutzername_value}}", $user->name, $ub);

  $answer->setSite('header', $ub);
}

?>
