<?php

    class Utilisateur extends Model {


      public function getUtilisateur() {
        $sql = "SELECT * FROM utilisateurs";
        $user = $this->getPDO()->query($sql);
        return $user;
      }
    }
