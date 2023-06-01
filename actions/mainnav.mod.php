<?php

$mn = file_get_contents('templates/mainnav.tpl.php');
if (!$mn) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  $mn = str_replace("{{navOverview}}", $trans->get('navOverview'), $mn);
  $mn = str_replace("{{navCat}}", $trans->get('navCat'), $mn);
  $mn = str_replace("{{navLitter}}", $trans->get('navLitter'), $mn);

  $answer->setSite('add', 'nav', $mn);
}

?>
