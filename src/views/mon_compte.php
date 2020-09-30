<?php
session_start();
require ("../core.php");
$user = Controller::getUtilisateurById($_GET['id']);
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
    <title>mon compte</title>
</head>
<body>
    <main class="my-form">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Mon compte</div>
                    <div class="card-body">
                    <h5 class="card-title"> <?= $user['nom'] . ' ' . $user['prenom'];?></h5>
                    <p class="card-text">Email : <?=  $user ['email'];?></p>
                    <p class="card-text">Adresse : <?= $user ['adresse'];?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Historique des commandes</div>
                    <div class="card-body">
                    <p class="card-text"> vide</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </main>


</body>
