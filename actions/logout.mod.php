<?php

$answer->setUser('loggedin', false);
$param->setSession('userid', '');
$user->active = false;

$answer->setSite('clear', 'main');
$answer->setSite('clear', 'nav');
$answer->setSite('delete', '#headerUser');

include('actions/init.mod.php');

?>
