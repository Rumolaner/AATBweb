<?php

$type = $param->get('type');
$number = $param->get('number');
$name = $param->get('name');
$litter = $param->get('litter');

$site = file_get_contents('templates/searchList.tpl.php');
$site = str_replace("{{lnumber}}", $number, $site);

if (!$site) {
  $answer->setCOM("Error: ".$trans->get('error1000'));
} else {
  switch($type) {
    case 'cat': 
      $parent = 'Cat';
      $tabName = 'cat';
      $stmt = 'SELECT tcat.id as value0, tcat.name as value1, tcat.name_official as value2, IFNULL(twurf.name, "---") as value3, "'.$trans->get('litter').'" as value4 from tcat left join twurf on tcat.twurf_id = twurf.id';
      $paramString = "";
      $params = [];
    break;
  }

  $site = str_replace("{{tab}}", $tabName, $site);


  $sql = new clsMysql();
  $res = $sql->get($stmt, $paramString, $params);
  $elements = "";

  if ($res->num_rows > 0) {
    while($row = $res->fetch_array(MYSQLI_ASSOC)){
      $element = file_get_contents('templates/searchListElement.tpl.php');
      $element = str_replace("{{searchlist}}", $tabName."Tab".$number, $element);

      for ($i = 0; $i < count($row); $i++) {
        $element = str_replace("{{value".$i."}}", $row['value'.$i], $element);
      }
//      $element = str_replace("{{name}}", $row['value1'], $element);
//      $element = str_replace("{{name_official}}", $row['value2'], $element);
//      $element = str_replace("{{littervalue}}", '', $element);

      $elements .= $element;
    }
  }

  $site = str_replace("{{elements}}", $elements, $site);
  $answer->setSite('add', '#main'.$parent, $site, '#'.$tabName.'Tab'.$number, false);
}

?>
