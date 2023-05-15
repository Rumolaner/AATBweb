<?php

$mandant = $param->get('m');
$username = $param->get('u');
$password = $param->get('p');

$user = clsUser::withLogin($mandant, $username, $password);
if (!$user->active){
  //Fehler zurückgeben
} else {
  $id = $user->id;
  $param->setSession('userid', $id);
}

var_dump($user);

?>
