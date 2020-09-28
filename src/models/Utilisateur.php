<?php

class Utilisateur extends Model{

  public $table;
  public $id;

  function read($fields) {
    $sql = "SELECT $fields FROM Utilisateurs WHERE id=".$this->id;
    $req = mysql_query($sql) or die (mysql_error());
    $data = mysql_fetch_assoc($req);
    return $data;
  }


}
