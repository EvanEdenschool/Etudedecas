<?php

class Controller {
    public static function inscription()
    {
        $email = $_POST['email'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $password = $_POST['password'];
        $date_inscription = date('Y-m-d H:i:s');
        print_r(Utilisateur::saveUtilisateur($email, $prenom, $nom, $date_inscription, $adresse, $password));


    }
}