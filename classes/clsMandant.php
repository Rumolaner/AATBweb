<?php

class clsMandant{
  function __construct($id){
    $this->sql = new clsMysql();

    $this->id = 0;
    $this->name;
    $this->active = false;
    $this->error = "error2003";

    $stmt = "SELECT tmandant.id, tmandant.name, tmandant.active from tmandant where tmandant.id = ?";
    $params = [$id];
    $res = $this->sql->get($stmt, "i", $params);

    if ($res->num_rows >= 1){
      while($row = $res->fetch_array(MYSQLI_ASSOC)){
        $this->error = "";
        $this->active = ($row['active']?true:false);
        $this->id = $row['id'];
        $this->name = $row['name'];
      }
    } else {
      $this->error = "error2003";
    }
  }
}

?>
