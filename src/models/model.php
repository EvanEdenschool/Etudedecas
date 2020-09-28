<?php

class Model{


  public $table;
  public $id;
  private $bdd;


  protected function executerRequete($sql) {
    $resultat = $this->getPDO()->query($sql);    // exécution directe
    return $resultat;
  }

  // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin


  function getPDO(){
  	try{
  		return $db = new PDO('mysql:host=localhost:3308;dbname=mediastore','root','',
  		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  	}
  	catch(Exception $e)

  	{
  		echo 'Error : '.$e->getMessage().'<br/>';
  		echo 'N° : '.$e->getCode();
  	}
  }


}
