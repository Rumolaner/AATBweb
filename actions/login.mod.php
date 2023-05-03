<?php

$mandant = $param->get('m');
$username = $param->get('u');
$password = $param->get('p');

$user = clsUser::withLogin($mandant, $username, $password);

var_dump($user);

?>
