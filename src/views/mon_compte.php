<?php
session_start();
require ("../core.php");
$user = Controller::getUtilisateurById($_GET['id']);

if ((isset($_POST['adresse_update'])&& $_POST['adresse_update'] != "")) {
    print_r($_GET['id']);
    $user = Controller::updateUserAddress($_GET['id']);
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
        .my-form {
            margin-bottom: 60px;
        }
        .infos {
            margin-top: 20px
        }
        .update {
            margin-bottom: 20px
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
        #bouton_adresse_update {
            background-color: #d9534f;
            border-style: none;
            border-radius: 5px;
            color: #FFFFFF;
            margin-left: 20px;
            height: 25px;
            width: 60px;
        }
        #bouton_adresse_update:hover {
            background-color: #BD4946;
        }
        .infos {
            margin-bottom: 10px;
        }
        .cmd {
            margin-bottom: 10px;
        }

    </style>
    <title>Mon compte</title>
</head>
<body>

    <?php
        include ("header.php");
    ?>
    <div class="container welcome">
        <h1>Bienvenue sur votre compte !</h1>
    </div>
    
    <main class="my-form container formbox">
        <div class="container infos">
            <div class="row justify-content-center ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>Mes informations</h3></div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Nom :</strong> <?= $user['nom'] . ' ' . $user['prenom'];?></h5>
                            <h5 class="card-text"><strong>Email :</strong> <?=  $user ['email'];?></h5>
                            <h5 class="card-text"><strong>Adresse :</strong> <?= $user ['adresse'];?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container cmd">
            <div class="row justify-content-center ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>Historique de mes commandes</h3></div>
                            <div class="card-body">
                                <h5 class="card-text"> vide</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container update">
            <div class="row justify-content-center ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h3>Modifier mes informations</h3></div>
                            <div class="card-body">
                                <h5>Enregistrer une nouvelle adresse de livraison :</h5>
                                <form name="form_mon_compte" action ="" method="post">
                                    <input type="text" name="adresse_update" id="adresse_update" style="width: 200px;">
                                    <button type="submit" name="valider" id="bouton_adresse_update">Valider</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        include ("footer.php");
    ?>

</body>
