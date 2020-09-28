<?php

    class Produit extends Model {


      public function getProduit() {
        $sql = "SELECT * FROM produits";
        $user = $this->getPDO()->query($sql);
        return $user;
      }
    }
