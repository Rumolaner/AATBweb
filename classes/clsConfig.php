<?php

class clsConfig {
  function __construct(){
    $temp = file_get_contents('config/config.php');
    $this->values = json_decode($temp);
  }

  function get($key){
    return $this->values->$key;
  }
}

?>
