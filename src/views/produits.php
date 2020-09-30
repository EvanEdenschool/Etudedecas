<?php
    $produits = Controller::getProduits();
?>
<div class="container separateur">
</div>

<div class="container">
    <div class="row filtre">
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

    </div>

    <div class="row">
        <?php
        foreach($produits as $produit) {?>
            <div class="col-md-3 produits">
                <a href="views/fiche_produit.php?id=<?=$produit['id_produit']?>"><img src="./img/<?= $produit['image'] ?>" alt=""></a><hr/>
                <p class="categorie"><?= $produit['categorie'] ?></p>
                <h3 class="titre"><?= $produit['nom'] ?></h3>
                <h4 class="prix"><?= $produit['prix'] . ' €' ?></h4>
                <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus" data-idProduit="<?= $produit['id_produit'] ?>"></span> Ajouter au panier</div>
            </div>
        <?php } ?>
    </div>
</div>