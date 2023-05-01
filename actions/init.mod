<?php

$site = file_get_contents('templates/login.tpl');
if (!$site) {
  $data['com'][] = "Error: Template could not be loaded";
  $data['AddSite'] = "";
} else {
  $data['AddSite'] = $site;
}

?>
