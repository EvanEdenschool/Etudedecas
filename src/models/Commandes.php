<?php

    class Commande extends Model {


      public function getCommande() {
        $sql = "SELECT * FROM commandes";
        $user = $this->getPDO()->query($sql);
        return $user;
      }

      public static function saveProduitByCommande($commande_id, $produit_id, $quantite) {
          $req = Model::getPDO()->prepare("INSERT INTO contient(id_produit, id_commande, quantite) VALUES (?,?,?)");
          if ($req->execute(array($produit_id, $commande_id, $quantite))) {
              return true;
          }
      }

      public static function getProduitByCommande($commande_id){
          $query = Model::getPDO()->prepare("SELECT * FROM contient WHERE id_commande = ?");
          $query->execute([$commande_id]);
          $commandes = $query->fetchAll();
          if($commandes){

              return $commandes;
          } else {
              return false;
          }
      }

      public static function getCommandesByUser($user_id) {
          $query = Model::getPDO()->prepare("SELECT * FROM commandes WHERE id_utilisateur = ? ORDER BY commandes.date_commande DESC");
          $query->execute([$user_id]);
          $users = $query->fetchAll();
          if($users){
              return $users;
          } else {
              return false;
          }
      }

      public static function saveCommande($date_commande, $montant_tot, $date_previsionnelle, $user_id) {
          $req = Model::getPDO()->prepare("INSERT INTO commandes(date_commande, montant_tot, date_previsionnelle, id_utilisateur) VALUES (?,?,?,?)");
          if ($req->execute(array($date_commande, $montant_tot, $date_previsionnelle, $user_id))) {
              return true;
          }
      }
    }
