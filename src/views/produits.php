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
        <div class="col-md-3 produits">
            <a href="views/fiche_produit.php"><img src="./img/dvd2" alt=""></a><hr/>
            <p class="categorie">Action</p>
            <h3 class="titre">Black Panther</h3>
            <h4 class="prix">19.90€</h4>
            <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter au panier</div>
        </div>

        <div class="col-md-3 produits">
            <img src="./img/dvd6" alt=""><hr/>
            <p class="categorie">Comédie</p>
            <h3 class="titre">Ralph 2.0</h3>
            <h4 class="prix">19.90€</h4>
            <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter au panier</div>
        </div>

        <div class="col-md-3 produits">
            <img src="./img/dvd5" alt=""><hr/>
            <p class="categorie">Comédie</p>
            <h3 class="titre">Jean-Christophe & Winnie</h3>
            <h4 class="prix">15.90€</h4>
            <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter au panier</div>
        </div>

        <div class="col-md-3 produits">
            <img src="./img/dvd4" alt=""><hr/>
            <p class="categorie">Comédie Musicale</p>
            <h3 class="titre">Casse Noisette</h3>
            <h4 class="prix">17.90€</h4>
            <div class="btn btn-danger addToCart"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter au panier</div>
        </div>

    </div>
</div>