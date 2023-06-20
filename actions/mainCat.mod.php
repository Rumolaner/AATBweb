<?php

$site = file_get_contents('templates/mainCat.tpl.php');
if (!$site) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  $site = str_replace("{{catfilter}}", $trans->get('catfilter'), $site);
  $site = str_replace("{{name}}", $trans->get('name'), $site);
  $site = str_replace("{{litter}}", $trans->get('litter'), $site);
  $site = str_replace("{{hint}}", $trans->get('catfilterhint'), $site);
  $site = str_replace("{{clear}}", $trans->get('btnclear'), $site);
  $site = str_replace("{{search}}", $trans->get('btnsearch'), $site);

  $answer->setSite('add', 'main', $site, "#mainCat", true);
}
?>
