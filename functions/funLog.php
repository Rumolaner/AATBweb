<?php

function funLog($area, $text, $debug = true){
  $config = new clsConfig();
  $debug = filter_var($config->get('debug'), FILTER_VALIDATE_BOOLEAN);

  if ($debug == true){
    $file = "logs/".date("Y-m-d").".log";

    $datei = fopen($file, "a");
    fwrite($datei, date("H:i:s")." ".$area." - ".$text."\r\n");
    fclose($datei);
  }
}

?>
