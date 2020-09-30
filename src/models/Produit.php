<?php

    class Produit extends Model {


      public static function getProduits() {
        $sql = "SELECT * FROM produits";
        $produits = Model::getPDO()->query($sql);
        return $produits;
      }

      public static function getProduitById($id) {
          $query = Model::getPDO()->prepare("SELECT * FROM produits WHERE id_produit = ?");
          $query->execute([$id]);
          $produit = $query->fetch();
          if($produit){
              return $produit;
          } else {
              return false;
          }

      }

      public static function saveProduit($nom, $categorie, $genre, $description, $image, $prix, $disponibilite, $date_edition, $editeur, $auteur)
      {
          $req = Model::getPDO()->prepare("INSERT INTO produits(nom, categorie, genre, description, image, prix, disponibilite, date_edition, editeur, auteur) VALUES (?,?,?,?,?,?,?,?,?,?)");
          if ($req->execute(array($nom, $categorie, $genre, $description, $image, $prix, $disponibilite, $date_edition, $editeur, $auteur))) {
              return true;
          }
      }
      
      public static function getFilteredProducts($categorie, $genre) {
        $query = Model::getPDO()->prepare(
          "SELECT * 
          FROM produits AS p  
          WHERE p.categorie = :categorie
          AND p.genre = :genre
          ORDER by p.prix ASC"
        );
        $query->execute(array (':categorie' => $categorie, ':genre' => $genre));

        while($produit =  $query->fetch()){         
           $produits [] = $produit;
        }
        if (!empty($produits)) {
          return $produits;
        }
         
      }
    }
