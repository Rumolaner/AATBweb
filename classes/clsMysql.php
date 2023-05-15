<?php

class clsMysql{
  function __construct(){
    $this->config = new clsConfig();

    $this->host = $this->config->get('dbhost');
    $this->user = $this->config->get('dbuser');
    $this->pwd = $this->config->get('dbpass');
    $this->database = $this->config->get('dbdatabase');
    $this->mysqli = NULL;
  }

  function connect(){
    $this->mysqli = new mysqli($this->host, $this->user, $this->pwd, $this->database);
    if ($this->mysqli->connect_errno){
      funLog("clsMysql", "Keine Verbindung zur Datenbank möglich! (".$mysqli->connect_errno.") ".$mysqli->connect_error);
      return false;
    }

    /* change character set to utf8 */
    if (!$this->mysqli->set_charset("utf8")){
      funLog("clsMysql", "Error loading character set utf8: ".$mysqli->error);
    }
  }

  function close(){
    $this->mysqli->close();
  }

  function get($statement, $types = NULL, $params = NULL){
    $values = false;
    $this->connect();

    /* Create a prepared statement */
    if($stmt = $this->mysqli->prepare($statement)){
      try{
        if ($types != NULL){
          // Bind parameters: s - string, b - boolean, i - int, etc
          if(!is_array($params)){
            $temp = $params;
            $params = Array();
            $params[] = $temp;
          }
          array_unshift($params, $types);

          if (!@call_user_func_array(array($stmt, "bind_param"), $this->vref($params))){
            funLog("clsMysql", "Statement: ".$statement);
            if ($params != NULL){
              funLog("clsMysql", "Parameter: ".implode("-", $params));
            }
            funLog("clsMysql", "Fehler beim binden der Values");
            return NULL;
          }
        }

        /* Execute it */
        if ($this->config->get('debug') == true){
          funLog("clsMysql", "Debug - Statement: ".$statement);
          if (is_array($params)){
            funLog("clsMysql", "Parameter: ".implode("-", $params));
          }
        }
        $stmt->execute();

        /* Bind results */
        $values = $stmt->get_result();
        $this->affectedrows = $this->mysqli->affected_rows;

        /* Close statement */
        $stmt -> close();
      }
      catch (Exception $ex){
        $this->affectedrows = 0;
        funLog("clsMysql", "Statement: ".$statement);
        if ($params != NULL){
          if(!is_array($params)){
            $temp = $params;
            $params = Array();
            $params[] = $temp;
          }
          funLog("clsMysql", "Parameter: ".implode("-", $params));
        }
        funLog("clsMysql", $ex->getMessage());
        funLog("clsMysql", "(".$this->mysqli->errno.") ".$this->mysqli->error);
      }
    }
    else{
      $this->affectedrows = 0;
      funLog("clsMysql", "Statement: ".$statement);
      if ($params != NULL){
        if(!is_array($params)){
          $temp = $params;
          $params = Array();
          $params[] = $temp;
        }

        funLog("clsMysql", "Parameter: ".implode("-", $params));
      }
      funLog("clsMysql", "(".$this->mysqli->errno.") ".$this->mysqli->error);
    }

    $this->close();
    return $values;
  }

  function vref($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0){
      $refs = array();
      foreach($arr as $key => $value){
        $refs[$key] = &$arr[$key];
      }
      return $refs;
    }
    return $arr;
  }

}

?>
