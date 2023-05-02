<?php

session_start();
header ('Content-Type: application/json');

include "functions/funGetLang.php";
include "classes/clsTranslate.php";

if (isset($_SESSION['userid'])){
  $data['loggedin'] = true;
} else {
  $data['loggedin'] = false;
}

//set user language, expand if more languages are implemented
$data['lang'] = funGetLang();
$trans = new clsTranslate($data['lang']);

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
