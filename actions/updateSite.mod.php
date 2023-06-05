<?php

$site = $param->get('s');
if ($site == null){
  $site = 'mainOverview';
}

if (!file_exists('actions/'.$site.'.mod.php')){
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  $method = 'update';
  include ('actions/'.$site.'.mod.php');
}

?>
