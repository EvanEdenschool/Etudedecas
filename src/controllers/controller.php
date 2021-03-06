<?php

class Controller {

    /*Utilisateur*/
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
    /* Mise a jour de l'adresse de l'utilisateur*/

    public static function updateUserAddress($id) {
        $adresse= $_POST['adresse_update'];
        $user = Utilisateur::updateUserAddress($id, $adresse);
        return $user;
    }

    /*Utilisateur*/


    /* Produits */
    public static function getProduits(){
        $produits = Produit::getProduits();
        return $produits;
    }


    public static function getProduitById($id) {
        $produit = Produit::getProduitById($id);
        return $produit;
    }

    public static function saveProduit() {
        $nom = isset($_POST['nom_produit']) ? $_POST['nom_produit'] : null ;
        $categorie = isset($_POST['categorie_produit']) ? $_POST['categorie_produit'] : null ;
        $genre = isset($_POST['genre_produit']) ? $_POST['genre_produit'] : null;
        $description = isset($_POST['description_produit']) ? $_POST['description_produit'] : null;
        $image = isset($_POST['image_produit']) ? $_POST['image_produit'] : null ;
        $prix = isset($_POST['prix_produit']) ? $_POST['prix_produit'] : null ;
        $disponibilite = isset($_POST['disponibilite_produit']) ? $_POST['disponibilite_produit'] : null;
        $date_edition = date('Y-m-d H:i:s'); // date du jour
        $editeur = isset($_POST['editeur_produit']) ? $_POST['editeur_produit'] : null ; 
        $auteur = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        // Si le produit a bien été sauvegardé
        if(Produit::saveProduit($nom,$categorie,$genre,$description,$image,$prix,$disponibilite,$date_edition,$editeur,$auteur)) {
            echo "Le produit a bien été enregistré";
        } else {
            echo "Une erreur et survenue lors de l'enregistrement";
        }

    }
     //fonction de recupération des produits par critere de selection
     public static function getProduitByCriteres() {
        $categorie = $_POST['categorie'];
        $genre = $_POST['genre'];
        $prix = $_POST['prix'];
        //
        return $produits = Produit::getFilteredProducts($categorie,$genre,$prix);
    }

    //fonction de recuperation des prodduits par categorie
    public static function getProduitByCategorie() {
        $categorie = $_POST['categorie'];
        return $produits = Produit::findBycategorie($categorie);
    }

    //fonction de recuperation des produits par prix croissant ou decroisssant
    public static function getProduitByPrix() {
        $prix = $_POST['prix'];
        return $produits = Produit::findByPrix($prix);
    } 
    //function de recuperation des produit par genre
    public static function getProduitByGenre () {
        $genre = $_POST['genre'];
        return $produit = Produit::findbyGenre($genre);
    }

    public static function getFicheProduit($id) {
        return $produit = Produit::getProduitById($id);

    }

    /* Produits */

    //fonction connexion
    public static function connexion() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //si l'utilisateur existe
        $user = Utilisateur::authentification($email,$password);
        if(isset($user) && $user) {
            header('Location:../');
            session_start();
            $_SESSION['user_id'] = $user['id_utilisateur'];
            $_SESSION['email'] = $user['email'];
        } else {
            echo "email ou mot de passe invalide";
        }
    }

    //fonction de redirection
    public static function redirectTo($page_vise) {
        $exploded_url = explode('/', $_SERVER['REQUEST_URI']);
        // si le dernier element du tableau = null alors on et pas sur la page principale
        if(end($exploded_url) == "") {
            array_pop($exploded_url);
            if(end($exploded_url) == "src") {
                if($page_vise != 'home') {
                    $link = "views/" . $page_vise;
                } else {
                    $link = './';
                }
            }
        } // sinon on
        else {
            array_pop($exploded_url);
            if(end($exploded_url) == 'views') {
                if($page_vise != 'home') {
                    $link = "./" . $page_vise;
                } else {
                    $link = '../';
                }
            }
        }
        return $link;
    }


    /* Commande */
    public static function createCommande() {
        if(Commande::saveCommande(date('Y-m-d H:i:s'), $_SESSION['prix_total'], date('Y-m-d H:i:s'), $_SESSION['user_id'])) {
            $commandes = Commande::getCommandesByUser($_SESSION['user_id']);
            foreach($_SESSION['panier'] as $produit) {
                Commande::saveProduitByCommande($commandes[0]['id_commande'], $produit['id_produit'], $produit['quantite']);
            }
            unset($_SESSION['panier']);
            unset($_SESSION['prix_total']);
            unset($_SESSION['count']);
        } else {
            echo 'nope';
        }

   }

   public static function getProduitsCommande($commande_id) {
       $commandes = Commande::getProduitByCommande($commande_id);
       return $commandes;
   }

   public static function getHistoriqueCommandes() {
        $commandes = Commande::getCommandesByUser($_SESSION['user_id']);
        return $commandes;
   }
    /* Commande */


    /* Panier */
    public static function addProduitToPanier()
    {
        $produit = Controller::getProduitById($_GET['id_p']);

        if(!isset($_SESSION['panier']['produit_' . $produit['id_produit']])) {
            $_SESSION['panier']['produit_' . $produit['id_produit']] = array(
                'id_produit' => $produit['id_produit'],
                'nom' => $produit['nom'],
                'image' => $produit['image'],
                'prix' => $produit['prix'] * $_GET['quantite'],
                'quantite' => $_GET['quantite'],
            );
        } else if (isset($_SESSION['panier']['produit_' . $produit['id_produit']])) {
            $_SESSION['panier']['produit_' . $produit['id_produit']]['quantite'] += $_GET['quantite'];
            $_SESSION['panier']['produit_' . $produit['id_produit']]['prix'] += ($produit['prix'] * $_GET['quantite']);
        }
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 0;
            $_SESSION['prix_total'] = 0;

        }
        $_SESSION['prix_total'] += ($produit['prix'] * $_GET['quantite']);
        $_SESSION['count'] += $_GET['quantite'];
        header('Location:../');
    }

    public static function deleteProduit($id) {
        if(isset($id) && isset($_SESSION['user_id'])) {
            $_SESSION['count'] -= $_SESSION['panier']['produit_' . $id]['quantite'];
            $_SESSION['prix_total'] -= $_SESSION['panier']['produit_' . $id]['prix'];
            unset($_SESSION['panier']['produit_' . $id]);

        } else {
            echo 'Une erreur et survenue lors de la supression';
        }
    }
    /* Panier */

}