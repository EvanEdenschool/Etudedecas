<?php
$produits = Controller::getProduits();
// si les champs sont posté on appelle la fonction inscription
if ((isset($_POST['categorie']) && $_POST['categorie'] != "") && (isset($_POST['prix']) && $_POST['prix'] != "") && (isset($_POST['genre']) && $_POST['genre'] != "")) {
    $produits = Controller::getProduitByCriteres();
}
?>

<div class="container separateur">
</div>

<div class="container">
    <div class="row filtre">
    <form name=" filter-produit" action="" onsubmit="return validFilter()" method="post">
    <select name="categorie" id="categorie" style="border: 2px solid #d9534f; border-radius: 5px">
            <option value="" selected disabled>Catégorie</option>
            <option value="cd">CD</option>
            <option value="dvd">DVD</option>
        </select>
        <select name="genre" id="genre" style="border: 2px solid #d9534f; border-radius: 5px">
            <option value="" selected disabled>Genre</option>
                <optgroup label="DVD">  
                    <option value="Action">Action</option>
                    <option value="Comedie">Comédie</option>
                    <option value="Comedie musicale">Comédie Musicale</option>
                    <option value="Drame">Drame</option>
                    <option value="Science fiction">Science Fiction</option>
                    <option value="Horreur">Horreur</option>
                </optgroup>
                <optgroup label="CD">  
                    <option value="rock">Rock</option>
                    <option value="metal">Métal</option>
                    <option value="hip hop">Hip Hop</option>
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
        if (!empty($produits)) {
        foreach($produits as $produit) {
            ?>
            <div class="col-md-3 produits">
                <a href="views/fiche_produit.php?id=<?=$produit['id_produit']?>"><img src="./img/<?= $produit['image'] ?>" alt=""></a><hr/>
                <p class="categorie"><?= $produit['categorie'] ?></p>
                <h3 class="titre"><?= $produit['nom'] ?></h3>
                <h4 class="prix"><?= $produit['prix'] . ' €' ?></h4>
                <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus" data-idProduit="<?= $produit['id_produit'] ?>"></span> Ajouter au panier</div>
            </div>
        <?php }
        }else { 
            echo 'Aucun produit ne correspond à votre recherche.';        
        }
        ?>
    </div>
</div>