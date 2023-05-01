<?php

session_start();
header ('Content-Type: application/json');

if (isset($_SESSION['userid'])){
  $data['loggedin'] = true;
} else {
  $data['loggedin'] = false;
}

$module = "actions/" . $_REQUEST['a'] . ".mod";
if ($_REQUEST['a'] != "") {
  $module = "actions/" .$_REQUEST['a']. ".mod";
}

if (file_exists($module)){
  include($module);
} else {
  $data['com'][] = "Error: Module could not be loaded";
}

echo json_encode($data);

?>
