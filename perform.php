<?php

session_start();
header ('Content-Type: application/json');

include "classes/clsConfig.php";
include "classes/clsParam.php";
include "functions/funGetLang.php";
include "functions/funLog.php";
include "classes/clsTranslate.php";
include "classes/clsUser.php";
include "classes/clsMandant.php";
include "classes/clsMysql.php";
include "classes/clsAnswer.php";

//prepare parameters
$param = new clsParam($_SESSION, $_REQUEST);
$answer = new clsAnswer();

$userid = $param->get('userid');
$answer->setUser('loggedin', false);
if ((int)$userid > 0){
  $user = clsUser::withId((int)$userid);

  if ($user->active){
    $answer->setUser('loggedin', true);
  }
} else {
  $user = new clsUser();
}

//set user language, expand if more languages are implemented
$lang = funGetLang();
$trans = new clsTranslate($lang);

$module = $param->get('a');
if (!$user->active && $module != 'init' && $module != 'login'){
  $answer->setSite('clear', 'main');
  $answer->setSite('clear', 'nav');
  $answer->setSite('delete', '#userBox');
  $module = "init";
  $answer->setCOM("Error: " . $trans->get($user->error));
}

if ($module != "") {
  $module = "actions/" .$module. ".mod.php";
}

if (file_exists($module)){
  include($module);
} else {
  $answer->setCOM("Error: " . $trans->get('error1000'));
  funLog("Error", "Modul konnte nicht geladen werden: ".$module);
}

echo $answer->getJSON();

?>
