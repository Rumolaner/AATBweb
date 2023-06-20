<?php

$type = $param->get('type');
$name = $param->get('name');
$litter = $param->get('litter');

$site = file_get_contents('templates/searchList.tpl.php');
if (!$site) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  $answer->setSite('add', '#mainCat', $site, '#catTab1', false);
}

?>
