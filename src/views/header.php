<?php
$linkToMonCompte = Controller::redirectTo('mon_compte.php');
$linkToSeDeconnecter = Controller::redirectTo('se_deconnecter.php');
$linkToInscription = Controller::redirectTo('inscription.php');
$linkToLogin = Controller::redirectTo('login.php');
$linkToPanier = Controller::redirectTo('panier.php');
?>

<!-- HEADER VERSION DESKTOP -->
<div id="header" class="container">
    <div class="row">
       <div class="col-md-4">
            <h2>Mediastore</h2>
            <a class="menu" href="../">Home</a>
       </div>
        <div class="col-md-4">
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a class="btn btn-danger menu" href="<?= $linkToMonCompte ?>?id=<?=$_SESSION['user_id']?>">MON COMPTE</a>
                <a class="btn btn-danger menu" href="<?= $linkToSeDeconnecter ?>?id=<?= $_SESSION['user_id'] ?>">DECONNEXION</a>

            <?php } else { ?>
                <a class="btn btn-danger menu" href="<?= $linkToInscription ?>">INSCRIPTION</a>
                <a class="btn btn-danger menu" href="<?= $linkToLogin ?>">CONNEXION</a>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <button id="searchBtn" class="menu"><span class="glyphicon glyphicon-search"></span></button>
            <input  class="menu" type="search" id="site-search" name="search" placeholder="Rechercher un produit">
            <?php  if(isset($_SESSION['user_id'])) { ?>
                <a href="<?= $linkToPanier ?>" class="btn btn-danger cart menu"><?=isset($_SESSION['count']) ? $_SESSION['count'] : ""?><span class="glyphicon glyphicon-shopping-cart"></span></a>
            <?php } ?>
        </div>
    </div>
</div>


<!-- HEADER VERSION MOBILE -->
<nav class="navbar navbar-default navbar-fixed-top smallMenu">
    <div class="container-fluid">
        <div class="navbar-header"><h2>Mediastore</h2>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#monMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="monMenu">
            <ul class="nav navbar-nav">
                <li><a href="../">HOME</a></li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li><a href="<?= $linkToMonCompte ?>?id=<?=$_SESSION['user_id']?>">MON COMPTE</a></li>
                <li><a href="<?= $linkToSeDeconnecter ?>?id=<?= $_SESSION['user_id'] ?>">DECONNEXION</a></li>
                <?php } else { ?>
                    <li><a href="<?= $linkToInscription ?>">INSCRIPTION</a></li>
                    <li><a href="<?= $linkToLogin ?>">CONNEXION</a></li>
                <?php } ?>
                <?php  if(isset($_SESSION['user_id'])) { ?>
                    <li><a href="<?= $linkToPanier ?>"><?=isset($_SESSION['count']) ? $_SESSION['count'] : ""?>PANIER</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>