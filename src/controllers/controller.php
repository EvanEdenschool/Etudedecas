<?php

class Controller {
    // fonction d'inscription
    public static function inscription()
    {
        $email = $_POST['email'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $password = $_POST['password'];
        $date_inscription = date('Y-m-d H:i:s'); // date du jour    
        // si saveUtilisateur() a bien fonctionné
        if(Utilisateur::saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse, $password) == true) {
            // on redirige sur la page login
            header('Location:login.php');
        } else {
            echo "Un compte existe deja pour cette adresse mail";
        }



    }
    //fonction connexion
    public static function connexion() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //si l'utilisateur existe
        if(Utilisateur::authentification($email,$password) == true) {
            header('Location:../');
        }else {
            echo "email ou mot de passe invalide";
        }
    }
}