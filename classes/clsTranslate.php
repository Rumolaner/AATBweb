<?php

class clsTranslate {

  function __construct($lang = "de") {
    $this->lang = $lang;

    $content = file_get_contents("languages/" . $this->lang . ".lang");
    $this->content = json_decode($content);
  }

  function get($subject){
    $trans = "{{".$subject."}}";

    if (isset($this->content->$subject)) {
      $trans = $this->content->$subject;
    }
    return $trans;
  }
}

?>
