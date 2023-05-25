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

  function setSite($parent, $site){
    $this->site[$parent][] = $site;
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

    $keys = array_keys($this->site);
    while (count($this->site) > 0){
      $values = array_shift($this->site);
      $key = array_shift($keys);
      while (count($values) > 0){
        $data['addSite'][$key][] = array_shift($values);
      }
    }

    return json_encode($data);
  }
}

?>
