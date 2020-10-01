<?php
$produits = Controller::getProduits();
// si les champs sont posté on appelle la fonction de filtre
if ((isset($_POST['categorie']) && $_POST['categorie'] != "") && (isset($_POST['prix']) && $_POST['prix'] != "") && (isset($_POST['genre']) && $_POST['genre'] != "")) {
    $produits = Controller::getProduitByCriteres();
}else if ((isset($_POST['categorie']) && $_POST['categorie'] != "")) {

    $produits = Controller::getProduitByCategorie();

}else if((isset($_POST['prix']) && $_POST['prix'] != "")) {
    $produits = Controller::getProduitByPrix();

}else if ((isset($_POST['genre']) && $_POST['genre'] != "") ) {
    $produits = Controller::getProduitByGenre();
}

$linkToProduit = Controller::redirectTo('fiche_produit.php');
$linkToAddPanier = Controller::redirectTo('add_produit_to_panier.php');
?>
<div class="container separateur">
</div>

<div class="container">

    <div class="row filtre">
        <form action="" method="post">
            <select name="categorie" id="categorie" style="border: 2px solid #d9534f; border-radius: 5px">
                <option value="" selected disabled>Catégorie</option>
                <option value="cd">CD</option>
                <option value="dvd">DVD</option>
            </select>
            <select name="genre" id="genre" style="border: 2px solid #d9534f; border-radius: 5px">
                <option value="" selected disabled>Genre</option>
                    <optgroup label="DVD">
                        <option value="action">Action</option>
                        <option value="comedie">Comédie</option>
                        <option value="comedie_musicale">Comédie Musicale</option>
                        <option value="drame">Drame</option>
                        <option value="science_fiction">Science Fiction</option>
                        <option value="horreur">Horreur</option>
                    </optgroup>
                    <optgroup label="CD">
                        <option value="rock">Rock</option>
                        <option value="metal">Métal</option>
                        <option value="hip_hop">Hip Hop</option>
                        <option value="electro">Electro</option>
                        <option value="variete">Variété française</option>
                    </optgroup>
            </select>
            <select name="prix" id="prix" style="border: 2px solid #d9534f; border-radius: 5px">
                <option value="" selected disabled>Prix</option>
                <option value="prix_croissant">Prix croissant</option>
                <option value="prix_decroissant">Prix décroissant</option>
            </select>

            <button style="background-color: #d9534f; border-style: none; margin-bottom: 30px; color: #FFFFFF; margin-left: 15px; border-radius: 5px"
                    id ="filtrer"
                    type="submit"
                    name="filtrer">Filtrer
            </button>
        </form>

    </div>
    <div class="row">
        <?php
        if(!empty($produits)) {
            foreach($produits as $produit) {
                if ($produit['disponibilite'] > 0) { ?>
                    <div class="col-md-3 produits">
                        <a href="./<?=$linkToProduit?>?id=<?= $produit['id_produit'] ?>"><img
                                    src="./img/<?= $produit['image'] ?>" alt=""></a>
                        <hr/>
                        <p class="categorie"><?= $produit['categorie'] ?></p>
                        <h3 class="titre"><?= $produit['nom'] ?></h3>
                        <h4 class="prix"><?= $produit['prix'] . ' €' ?></h4>
                        <a href="<?=$linkToAddPanier?>?id_p=<?= $produit['id_produit'] ?>"
                           class="btn btn-danger addToCart">
                            <span class="glyphicon glyphicon glyphicon-plus"
                                  data-idProduit="<?= $produit['id_produit'] ?>"></span>
                            Ajouter au panier
                        </a>
                        
                        <select name="quantite" id="quantite">
                            <option value="quantite">1</option>
                            <option value="quantite">2</option>
                            <option value="quantite">3</option>
                            <option value="quantite">4</option>
                            <option value="quantite">5</option>
                            <option value="quantite">6</option>
                            <option value="quantite">7</option>
                            <option value="quantite">8</option>
                            <option value="quantite">9</option>
                            <option value="quantite">10</option>
                        </select>
                    </div>
                <?php }
            }
        } else {
            echo 'Aucun produit ne correspond à votre recherche.';
        }
        ?>
    </div>
</div>