<?php

    class Utilisateur extends Model {


      public static function getUtilisateur()
      {
        $sql = "SELECT * FROM utilisateurs";
        $user = Model::getPDO()->query($sql);
        return $user;
      }

        ///// NE PAS TOUCHER
      public static function saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse = null, $password)
      {

          $req = Model::getPDO()->prepare("INSERT INTO utilisateurs(nom, prenom, date_inscription, email, password, adresse) VALUES ('$nom', '$prenom', '$date_inscription', '$email', '$password', '$adresse')");

          return $req->execute();

      }
    }
