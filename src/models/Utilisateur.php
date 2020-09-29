<?php

    class Utilisateur extends Model {

      // recupere les utilisateurs du site
      public static function getUtilisateur()
      {
        $sql = "SELECT * FROM utilisateurs";
        $user = Model::getPDO()->query($sql);
        return $user;
      }

      // sauvegarde un utilisateur
      public static function saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse = null, $password)
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
    }
