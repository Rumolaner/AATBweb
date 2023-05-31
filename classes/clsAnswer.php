<?php

class clsAnswer {
  function __construct(){
    $this->user = array();
    $this->com = array();
    $this->site = array();
  }

  function setUser($key, $value){
    $this->user[$key] = $value;
  }

  function setCOM($text){
    $this->com[] = $text;
  }

  function setSite($action, $parent, $site = "", $visible = true){
    $temp['action'] = $action;
    $temp['parent'] = $parent;
    $temp['site'] = $site;
    $temp['visible'] = $visible;
    $this->site[] = $temp;
  }

  function getJSON(){
    $data = array();
    $keysU = array_keys($this->user);
    while (count($this->user) > 0){
      $value = array_shift($this->user);
      $key = array_shift($keysU);
      $data['user'][$key] = $value;
    }

    while (count($this->com) > 0){
      $data['com'][] = array_shift($this->com);
    }

    while (count($this->site) > 0){
      $values = array_shift($this->site);
      $keys = array_keys($values);
      $site = array();
      while (count($values) > 0){
        $key = array_shift($keys);
        $site[$key] = $values[$key];
        unset($values[$key]);
      }
      $data['sites'][] = $site;

    }

    return json_encode($data);
  }
}

?>
