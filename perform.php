<?php

session_start();
header ('Content-Type: application/json');

if (isset($_SESSION['userid'])){
  $data['loggedin'] = true;
} else {
  $data['loggedin'] = false;
}
$data['AddSite'] = '<div>Hello this is a test</div>';

echo json_encode($data);

?>
