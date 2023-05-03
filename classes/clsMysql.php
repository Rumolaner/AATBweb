<?php

class clsMysql{
  function __construct(){
    $config = new clsConfig();

    $this->host = $config->get('dbhost');
    $this->user = $config->get('dbuser');
    $this->pass = $config->get('dbpass');
    $this->database = $config->get('dbdatabase');
  }
}

?>
