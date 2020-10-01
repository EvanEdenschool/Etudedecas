<?php
session_start();
require "../core.php";
$produit = controller::getProduitById($_GET['id']);
$linkToAddPanier = Controller::redirectTo('add_produit_to_panier.php');

?>

<html lang="fr" dir="ltr">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style type="text/css">
        #header {
            background-color: #FFFFFF;
            min-height: 120px;
            height: auto;
        }
        h2 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-transform: uppercase;
            font-size: 3rem;
            margin-top: 30px;
        }
        a {
            text-decoration: none;
            text-transform: uppercase;
            color: #d9534f;
            font-weight: bold;
            margin-right: 20px;
        }
        a:hover {
            text-decoration: none;
            color: #000000;
        }
        .btn {
            float: right;
            margin-top: 30px;
            margin-right: 10px;
        }
        .cart {
            height: 35px;
        }
        .glyphicon-shopping-cart {
            margin: 3px auto;
        }
        #site-search {
            border: #d9534f 2px solid;
            border-radius: 5px;
            margin-top: 35px;
        }
        #searchBtn {
            height: 25px;
            background-color: #d9534f;
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
            margin-left: 25px;
        }
        .nouveautes {
            min-height: 350px;
            height: auto;
            background-color: #000000;
            background-image: url(../img/cd.jpg);
            background-repeat: no-repeat;
            background-position: center;
        }
        h1 {
            color: #FFFFFF;
            font-size: 3.7rem;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            padding-top: 120px;
            text-shadow: 2px 2px 3px #000000;
        }

        /* FICHE PRODUIT DETAILLE */

        .boiteProduit {
            border: 3px solid #d9534f;
            border-radius: 10px;
            min-height: 500px;
            height: auto;
            margin-top: 50px;
            margin-bottom: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            box-shadow: 1px 1px 3px #000000;
        }
        article {
            text-align: center;
        }
        aside {
            text-align: left;
        }
        h3 {
            color: #d9534f;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1.5rem;
        }
        span {
            color: #000000;
            text-transform: initial;
            font-weight: normal;
        }
        .description {
            margin-top: 50px;
        }
        .description h3 {
            margin-bottom: 30px;
        }
        .description p {
            text-align: justify;
            line-height: 30px;
        }

        /* HEADER MOBILE */
        @media screen and (max-width: 530px) {

        .menu {
            display: none;
        }
        h2 {
            color: #FFFFFF;
        }
        .navbar-header {
            background-color: #d9534f;
        }
        .icon-bar {
            background-color: #FFFFFF;
        }

        }


        @media screen and (min-width: 530px) {

        .smallMenu {
            display: none;
        }

        }

    </style>
  </head>
  <body>

        <?php
            include ("header.php");
        ?>
        <?php
            include ("nouveautes.php");
        ?>

        <div class="container">
            <div class="row boiteProduit col-md-8 col-md-offset-2">
                <main class="col-md-6">
                    <article>
                        <img src="../img/<?= $produit['image'] ?>" alt="../img/dvd2.jpg" title="">
                        <a href="<?=$linkToAddPanier?>?id_p=<?= $produit['id_produit'] ?>" 
                        class="btn btn-danger addToCart" style="margin-right: 145px;">
                            <span class="glyphicon glyphicon glyphicon-plus"></span>
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
                    </article>
                </main>
                <aside class="col-md-6">
                <?php if(!empty($produit)){

            ?>
               
                    <tbody>
                        <tr>
                            <td><h3>Titre : <span><?= $produit['nom'] ?></span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Prix : <span><?= $produit['prix'] ?> €</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Catégorie : <span><?= $produit['categorie'] ?></span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Disponibilité : <span><?= $produit['disponibilite'] ?></span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Année de sortie : <span><?= $produit['date_edition'] ?></span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Auteur/Réalisateur : <span><?= $produit['auteur'] ?></span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Editeur : <span><?= $produit['editeur'] ?></span></h3></td> 
                        </tr>
                    </tbody>
                    <?php
                     }
                    ?>
                </aside>

                <div class="col-md-12 description">
                    <hr/><h3>Résumé :</h3>
                    <?php if(!empty($produit)){ ?>
                    <p><?=$produit['description'] ?></p>
                    <?php }?>
                </div>
            </div>
        </div>
    
        <?php
            include ("footer.php")
        ?>

  </body>
</html>