<?php

    class Commande extends Model {


      public function getCommande() {
        $sql = "SELECT * FROM commandes";
        $user = $this->getPDO()->query($sql);
        return $user;
      }
    }
