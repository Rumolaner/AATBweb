<?php

class clsParam {
  function __construct($session, $request){
    $this->session = $session;
    $this->request = $request;
  }

  function get($key, $set = ''){
    $result = "";
    if ($set == 'session' || $set == ''){
      $result = $this->session[$key];
    }
    if (($set == 'request' || $set == '') && $result == ""){
      $result = $this->request[$key];
    }
    return $result;
  }

  function setSession($var, $value){
    $_SESSION[$var] = $value;
  }
}

?>


