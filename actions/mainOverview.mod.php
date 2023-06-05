<?php

$site = file_get_contents('templates/mainOverview.tpl.php');
if (!$site) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  //$site = str_replace("{{time}}", $trans->get('mandant'), $site);
  $site = str_replace("{{time}}", time(), $site);

  if (isset($method)){
    $answer->setSite($method, 'main', $site, '#mainOverview');
  }else{
    $answer->setSite('add', 'main', $site, '#mainOverview');
  }
}
?>
