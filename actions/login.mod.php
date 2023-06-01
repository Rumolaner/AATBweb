<?php

$mandant = $param->get('m');
$username = $param->get('u');
$password = $param->get('p');

$user = clsUser::withLogin($mandant, $username, $password);
if (!$user->active){
  //Fehler zurückgeben
  $answer->setCOM("Error: ".$trans->get($user->error));
} else {
  //Prüfen ob Account noch Aktiv
  $answer->setUser('loggedin', $user->active);

  $id = $user->id;
  $param->setSession('userid', $id);

  $answer->setSite('clear', 'main');
  include ('actions/userbox.mod.php');
  include ('actions/mainnav.mod.php');
  include ('actions/overview.mod.php');
}

?>
