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

  include ('actions/userbox.mod.php');
}

//var_dump($user);

?>
