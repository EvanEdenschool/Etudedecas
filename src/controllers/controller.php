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

    // recupere l'utilisateur connecté
    public static function getUtilisateurById($id) {
        $user = Utilisateur::getUtilisateurById($id);
        return $user;
    }


    /* Produits */
    public static function getProduits(){
        $produits = Produit::getProduits();
        return $produits;
    }

    public static function saveProduit() {
        $nom = $_POST['nom_produit'];
        $categorie = $_POST['categorie_produit'];
        $genre = $_POST['genre_produit'];
        $description = $_POST['description_produit'];
        $image = $_POST['image_produit'];
        $prix = $_POST['prix_produit'];
        $disponibilite = $_POST['disponibilite_produit'];
        $date_edition = date('Y-m-d H:i:s'); // date du jour
        $editeur = $_POST['editeur_produit'];
        $auteur = $_SESSION['email'];
        // Si le produit a bien été sauvegardé
        if(Produit::saveProduit($nom,$categorie,$genre,$description,$image,$prix,$disponibilite,$date_edition,$editeur,$auteur)) {
            echo "Le produit a bien été enregistré";
        } else {
            echo "Une erreur et survenue lors de l'enregistrement";
        }

    }
    /* Produits */

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