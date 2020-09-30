<?php
session_start();
require "../core.php";
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
                        <img src="../img/dvd2.jpg" alt="../img/dvd2.jpg" title="Black Panther">
                    </article>
                </main>
                <aside class="col-md-6">
                    <tbody>
                        <tr>
                            <td><h3>Titre : <span>Black Panther</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Prix : <span>19.90€</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Catégorie : <span>Action</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Disponibilité : <span>En stock</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Année de sortie : <span>2018</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Auteur/Réalisateur : <span>Ryan Coogler</span></h3></td> 
                        </tr>
                        <tr>
                            <td><h3>Editeur : <span>Marvel Studios</span></h3></td> 
                        </tr>
                    </tbody>
                </aside>

                <div class="col-md-12 description">
                    <hr/><h3>Résumé :</h3>
                    <p>Après avoir participé à l'affrontement entre Iron Man et Captain America, 
                        le prince T'Challa retourne chez lui dans la nation africaine reculée et 
                        technologiquement avancée du Wakanda, pour servir son pays en tant que 
                        nouveau roi. Cependant, le pouvoir de T'Challa va bientôt être défié par 
                        des membres de son propre pays. Quand deux ennemis conspirent pour détruire 
                        le Wakanda, la Panthère noire doit s'allier à l'agent de la CIA Everett 
                        K. Ross et aux membres du Dora Milaje, les forces spéciales du Wakanda, 
                        pour éviter que le pays ne soit emporté dans un conflit mondial.</p>
                </div>
            </div>
        </div>
    
        <?php
            include ("footer.php")
        ?>

  </body>
</html>