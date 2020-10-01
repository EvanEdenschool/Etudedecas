<?php
$linkToMonCompte = Controller::redirectTo('mon_compte.php');
$linkToSeDeconnecter = Controller::redirectTo('se_deconnecter.php');
$linkToInscription = Controller::redirectTo('inscription.php');
$linkToLogin = Controller::redirectTo('login.php');
$linkToPanier = Controller::redirectTo('panier.php');
?>

<div id="header" class="container">
    <div class="row">
       <div class="col-md-4">
            <h2>Mediastore</h2>
            <a href="../">Home</a>
            <a href="#">CD</a>
            <a href="#">DVD</a>
       </div>
        <div class="col-md-4">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a class="btn btn-danger" href="<?= $linkToMonCompte ?>?id=<?=$_SESSION['user_id']?>">MON COMPTE</a>
                <a class="btn btn-danger" href="<?= $linkToSeDeconnecter ?>?id=<?= $_SESSION['user_id'] ?>">DECONNEXION</a>

            <?php } else { ?>
                <a class="btn btn-danger" href="<?= $linkToInscription ?>">INSCRIPTION</a>
                <a class="btn btn-danger" href="<?= $linkToLogin ?>">CONNEXION</a>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <button id="searchBtn"><span class="glyphicon glyphicon-search"></span></button>
            <input type="search" id="site-search" name="search" placeholder="Rechercher un produit">
            <?php  if(isset($_SESSION['user_id'])) { ?>
                <a href="<?= $linkToPanier ?>" class="btn btn-danger cart"><?=isset($_SESSION['panier']['count']) ? $_SESSION['panier']['count'] : ""?><span class="glyphicon glyphicon-shopping-cart"></span></a>
            <?php } ?>
        </div>
    </div>
</div>
