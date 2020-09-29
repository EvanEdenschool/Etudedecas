<?php

class Controller {
    // fonction d'inscription
    public static function inscription()
    {
        $email = $_POST['email'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $date_inscription = date('Y-m-d H:i:s'); // date du jour    
        // si saveUtilisateur() a bien fonctionné
        if (Utilisateur::saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse, $password) == true) {
            // on redirige sur la page login
            header('Location:login.php');
        } else {
            echo "Un compte existe deja pour cette adresse mail";
        }
    }

    public static function getUtilisateurById($id) {

        $user = Utilisateur::getUtilisateurById($id);
        return $user;
    }

    //fonction connexion
    public static function connexion() {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        //si l'utilisateur existe
        $user = Utilisateur::authentification($email,$password);
        if(isset($user) && $user) {
            header('Location:../');
            session_start();
            $_SESSION['user_id'] = $user['id_utilisateur'];
            $_SESSION['email'] = $user['email'];


        }else {
            echo "email ou mot de passe invalide";
        }
    }
}