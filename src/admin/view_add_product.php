<?php
    session_start();
    require "../core.php";
    // fonction qui tcheq si l'utilisateur et bien admin
if(isset($_POST)) {
    Controller::saveProduit();
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../js/index.js"></script>
        <title>Ajout de produit</title>
    </head>
    <body>
        <div class="card">
            <div class="card-header">Ajout de produit</div>
            <div class="card-body">
                <form name="add-product-form" id="add_product_form" onsubmit="return validCnx()" action="" method="post">
                    <div class="form-group row">
                        <label for="nom_produit" class="col-md-4 col-form-label text-md-right">Nom produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="nom_produit" class="form-control" name="nom_produit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre_produit" class="col-md-4 col-form-label text-md-right">Genre produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="genre_produit" class="form-control" name="genre_produit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categorie_produit" class="col-md-4 col-form-label text-md-right">Categorie produit :</label>
                        <div class="col-md-6">
                            <select id="categorie_produit" class="form-control" name="categorie_produit">
                                <option value="DVD">DVD</option>
                                <option value="CD">CD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description_produit" class="col-md-4 col-form-label text-md-right">Description produit :</label>
                        <div class="col-md-6">
                            <textarea id="description_produit" class="form-control" name="description_produit"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image_produit" class="col-md-4 col-form-label text-md-right">Image produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="image_produit" class="form-control" name="image_produit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prix_produit" class="col-md-4 col-form-label text-md-right">Prix produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="prix_produit" class="form-control" name="prix_produit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="disponibilite_produit" class="col-md-4 col-form-label text-md-right">Disponibilité (STOCK) produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="disponibilite_produit" class="form-control" name="disponibilite_produit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="editeur_produit" class="col-md-4 col-form-label text-md-right">Editeur produit :</label>
                        <div class="col-md-6">
                            <input type="text" id="editeur_produit" class="form-control" name="editeur_produit">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            Connexion
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

