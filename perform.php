<?php

session_start();
header ('Content-Type: application/json');

include "classes/clsConfig.php";
include "classes/clsParam.php";
include "functions/funGetLang.php";
include "functions/funLog.php";
include "classes/clsTranslate.php";
include "classes/clsUser.php";
include "classes/clsMysql.php";
include "classes/clsAnswer.php";

//prepare parameters
$param = new clsParam($_SESSION, $_REQUEST);
$answer = new clsAnswer();

$userid = $param->get('userid');
if ((int)$userid > 0){
  $data['loggedin'] = true;
} else {
  $data['loggedin'] = false;
}

//set user language, expand if more languages are implemented
$data['lang'] = funGetLang();
$trans = new clsTranslate($data['lang']);

//$module = "actions/" . $param->get('a') . ".mod.php";
if ($param->get('a') != "") {
  $module = "actions/" .$param->get('a'). ".mod.php";
}

if (file_exists($module)){
  include($module);
} else {
  $answer->setCOM("Error: " . $trans->get('error1000'));
  funLog("Error", "Modul konnte nicht geladen werden: ".$module);
}

echo $answer->getJSON();

?>
