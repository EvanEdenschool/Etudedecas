<?php

    class Utilisateur extends Model {

      // recupere les utilisateurs du site
      public static function getUtilisateur()
      {
        $sql = "SELECT * FROM utilisateurs";
        $user = Model::getPDO()->query($sql);
        return $user;
      }

      public static function getUtilisateurById($id):Utilisateur {
        $query = Model::getPDO()->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
        $query->execute([$id]); 
        $user = $query->fetch();
          if($user){         
              return $user;
          } else {
              return false;
          }

      }

      // sauvegarde un utilisateur
      public static function saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse = null, $password):boolean
      {
          // on recupere les utilisateurs existant
          $users = Utilisateur::getUtilisateur();
          $exist = null;
          // on verifie si l'utilisateur n'existe pas déja
          foreach ($users as $user) {
              if ($user['email'] === $email) {
                  $exist = true;
              }
          }
          if ($exist != true) {
              $req = Model::getPDO()->prepare("INSERT INTO utilisateurs(nom, prenom, date_inscription, email, password, adresse) VALUES (?,?,?,?,?,?)");
              if ($req->execute(array($nom, $prenom, $date_inscription, $email, $password, $adresse))) {
                  return true;
              }
          } else {
              return false;
          }

      }
      public static function authentification($email, $password) {

        $query = Model::getPDO()->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch();
        if ( password_verify($user['password'], $password))
        {
          return $user;
        } else {
          return false;
        }
      }
    }
