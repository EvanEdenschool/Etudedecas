<?php
session_start();
require "../core.php";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
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
            background-color: #000000;
            height: 200px;
        }
        .welcome {
            min-height: 350px;
            height: auto;
            background-image: url(../img/cd.jpg);
            background-repeat: no-repeat;
            background-position: center;
        }
        .welcome h1 {
            color: #FFFFFF;
            font-size: 3.7rem;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            padding-top: 120px;
            text-shadow: 2px 2px 3px #000000;
        }
        
        /* PANIER */

        thead {
            font-size: 2.5rem;
            color: #d9534f;
        }
        tr {
            border-bottom: 1px solid #000000;
        }
        th {
            text-align: center;
        }
        td {
            font-size: 1.5rem;
            text-align: center;
            font-weight: bold;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .middle {
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }
        .card {
            border-radius: 3px;
        }


    </style>
    <title>Mon panier</title>
</head>
<body>

    <?php
        include ("header.php");
    ?>
    <div class="container welcome">
        <h1>Mon panier</h1>
    </div>


    <main class="my-form container formbox">
        <div class="container infos">
            <div class="row justify-content-center ">
                <div class="col-md-6">
                    <div class="card">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Quantité</th>
                                    <th class="middle" scope="col">Produit</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($_SESSION['panier'] as $panierProduit) {?>
                                <tr>
                                    <td><?= $panierProduit['quantite'] ?></td>
                                    <td class="middle"><?= $panierProduit['nom'] ?></td>
                                    <td><?= $panierProduit['prix'] ?>€</td>
                                </tr>
                            <?php }?>

                            </tbody>
                        </table>
                    </div><br/><br/><br/>
                    <div class="card justify-content-right col-md-6 offset-md-6">
                        <table>
                            <tbody>
                                <tr style="border: none;">
                                    <!-- <td style="visibility: hidden;"><a href="" class="glyphicon glyphicon-plus"></a><a href="" class="glyphicon glyphicon-minus"></a>1</td> -->
                                    <td style="text-align: center;">Montant total :</td>
                                    <td style="text-align: center;"><?= $_SESSION['prix_total'] ?>€</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><br/><br/><br/>
                    <div class="justify-content-right col-md-6 offset-md-7">
                        <div class="btn btn-default" style="color: #d9534f; font-weight: bold; margin-right: 28px">Valider mon panier</div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    
    
    <?php
        include ("footer.php");
    ?>

</body>
</html>
