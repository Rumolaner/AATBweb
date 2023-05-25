<?php

$mandant = $param->get('m');
$username = $param->get('u');
$password = $param->get('p');

$user = clsUser::withLogin($mandant, $username, $password);
if (!$user->active){
  //Fehler zurückgeben
  $answer->setCOM("Error: ".$trans->get('error2000'));
} else {
  //Prüfen ob Account noch Aktiv


  $id = $user->id;
  $param->setSession('userid', $id);
}

//var_dump($user);

?>
