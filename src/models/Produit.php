<?php

    class Produit extends Model {


      public static function getProduits() {
        $sql = "SELECT * FROM produits";
        $produits = Model::getPDO()->query($sql);
        return $produits;
      }

      public static function saveProduit($nom, $categorie, $genre, $description, $image, $prix, $disponibilite, $date_edition, $editeur, $auteur)
      {
          $req = Model::getPDO()->prepare("INSERT INTO produits(nom, categorie, genre, description, image, prix, disponibilite, date_edition, editeur, auteur) VALUES (?,?,?,?,?,?,?,?,?,?)");
          if ($req->execute(array($nom, $categorie, $genre, $description, $image, $prix, $disponibilite, $date_edition, $editeur, $auteur))) {
              return true;
          }
      }
    }
