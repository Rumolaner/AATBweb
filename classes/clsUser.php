<?php

class clsUser{
  function __construct(){
    $this->sql = new clsMysql();
    $this->active = false;
    $this->error = "error2001";
    $this->name = "";
    $this->username = "";
    $this->mandant = null;
    $this->id = -1;
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
    $this->mandant = null;
    $this->name = "";
    $this->username = "";
    $this->password = "";
    $this->active = false;
    $this->error = "error2001";

    $stmt = "SELECT tuser.id, tuser.password, tuser.name, tmandant.id as manid, tuser.active from tuser inner join tmandant on tuser.tmandant_id = tmandant.id where tuser.id = ?";
    $params = [$id];
    $res = $this->sql->get($stmt, "i", $params);

    if ($res->num_rows > 0){
      while($row = $res->fetch_array(MYSQLI_ASSOC)){
        $this->error = "";
        $this->active = ($row['active']?true:false);
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->mandant = new clsMandant($row['manid']);

        if (!$this->active){
          $this->error = "error2006";
        }

        if (!$this->mandant->active){
          $this->active = false;
          $this->error = "error2004";
        }
      }
    } else {
      $this->error = "error2001";
    }

  }

  protected function login($mandant, $username, $password){
    $this->id = 0;
    $this->mandant = null;
    $this->name = "";
    $this->username = $username;
    $this->password = $password;
    $this->active = false;
    $this->error = "error2000";

    $stmt = "SELECT tuser.id, tuser.password, tuser.name, tmandant.id as manid, tuser.active from tuser inner join tmandant on tuser.tmandant_id = tmandant.id where tuser.login = ? and tmandant.name = ?";
    $params = [$username, $mandant];
    $res = $this->sql->get($stmt, "ss", $params);

    if ($res->num_rows > 1){
      $this->error = "error2005";
    } elseif ($res->num_rows == 1){
      while($row = $res->fetch_array(MYSQLI_ASSOC)){
        if (password_verify($password, $row['password'])){
          $this->error = "";
          $this->active = ($row['active']?true:false);
          $this->id = $row['id'];
          $this->name = $row['name'];
          $this->mandant = new clsMandant($row['manid']);

          if (!$this->active){
            $this->error = "error2006";
          }

          if (!$this->mandant->active){
            $this->active = false;
            $this->error = "error2004";
          }
        } else {
          $this->error = "error2000";
        }
      }
    } else {
      $this->error = "error2000";
    }
  }
}

?>
