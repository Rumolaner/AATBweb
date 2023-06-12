<?php

$site = file_get_contents('templates/mainCat.tpl.php');
if (!$site) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
//    $site = str_replace("{{mandant}}", $trans->get('mandant'), $site);

  $answer->setSite('add', 'main', $site, "#mainCat", true);
}
?>
