<?php

class clsAnswer {
  function __construct(){
    $this->com = array();
    $this->site = array();
  }

  function setCOM($text){
    $this->com[] = $text;
  }

  function setSite($parent, $site){
    $this->site[$parent][] = $site;
  }

  function getJSON(){
    $data = array();
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
