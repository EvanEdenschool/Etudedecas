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
      //fonction de recupration de produit en fonction des criteres selectionne 
      public static function getFilteredProducts($categorie, $genre, $prix) {
        //on filtre par prix croissant
       if ( $prix === "prix_croissant") {
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
         
        //on filtre par prix decroissant
       }else if ($prix === "prix_decroissant") {
        $query = Model::getPDO()->prepare(
          "SELECT * 
          FROM produits AS p  
          WHERE p.categorie = :categorie
          AND p.genre = :genre
          ORDER by p.prix DESC");
        $query->execute(array (':categorie' => $categorie, ':genre' => $genre));

        while($produit =  $query->fetch()){         
           $produits [] = $produit;
        }
        if (!empty($produits)) {
          return $produits;
        }

       }   
      }
      // fonction de recupération des produits par catégorie
      public static function findBycategorie($categorie) {
        $query = Model::getPDO()->prepare(
          "SELECT * 
          FROM produits AS p 
          WHERE p.categorie = :categorie"
        );
        $query->execute(array (':categorie' => $categorie));
        while($produit =  $query->fetch()){         
          $produits [] = $produit;
       }
       if (!empty($produits)) {
         return $produits;
       }
      }
      //fonction de recuperation des produits par prix croissant ou decroisssant
      public static function findByPrix($prix) {
          //on filtre par prix croissant
        if ( $prix === "prix_croissant") {
          $query = Model::getPDO()->prepare(
            "SELECT * 
             FROM produits AS p 
             ORDER BY p.prix ASC" 
          );
          $query->execute();
          while($produit =  $query->fetch()){         
            $produits [] = $produit;
          }
          if (!empty($produits)) {
            return $produits;
          }
        }
        if ( $prix === "prix_decroissant") {
          $query = Model::getPDO()->prepare("SELECT * FROM produits AS p ORDER BY p.prix DESC" );
          $query->execute();
          while($produit =  $query->fetch()){         
            $produits [] = $produit;
          }
          if (!empty($produits)) {
            return $produits;
          }
        }
      }
      //recupération des produit par leur genre 
      public static function findbyGenre($genre) {
        $query = Model::getPDO()->prepare(
          "SELECT * 
          FROM produits AS p 
          WHERE p.genre = :genre"
        );
        $query->execute(array (':genre' => $genre));
        while($produit =  $query->fetch()){         
          $produits [] = $produit;
       }
       if (!empty($produits)) {
         return $produits;
       }

      }
    }
