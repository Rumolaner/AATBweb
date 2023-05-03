<?php

class clsUser{
  function __construct(){
  }

  public static function withID($id){
    $instance = new self();
    $instance->loadByID($id);
    return $instance;
  }

  public static function withLogin($mandant, $username, $password){
    $instance = new self();
    $instance->login($mandant, $username, $password);
    return $instance;
  }

  protected function loadByID($id){
    $this->id = $id;
    $this->active = false;
    $this->error = "error2001";
    $this->sql = new clsMysql();
  }

  protected function login($mandant, $username, $password){
    $this->mandant = $mandant;
    $this->username = $username;
    $this->password = $password;
    $this->active = false;
    $this->error = "error2000";
    $this->sql = new clsMysql();
  }
}

?>
