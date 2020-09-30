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
                <a class="btn btn-danger" href="views/mon_compte.php?id=<?=$_SESSION['user_id']?>">MON COMPTE</a>
                <a class="btn btn-danger" href="views/se_deconnecter.php?id=<?= $_SESSION['user_id'] ?>">DECONNEXION</a>

            <?php } else { ?>
                <a class="btn btn-danger" href="views/inscription.php">INSCRIPTION</a>
                <a class="btn btn-danger" href="views/login.php">CONNEXION</a>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <button id="searchBtn"><span class="glyphicon glyphicon-search"></span></button>
            <input type="search" id="site-search" name="search" placeholder="Rechercher un produit">
            <?php  if(isset($_SESSION['user_id'])) { ?>
                <div class="btn btn-danger cart"><?=isset($_SESSION['panier']['count']) ? $_SESSION['panier']['count'] : ""?><span class="glyphicon glyphicon-shopping-cart"></span></div>
            <?php } ?>
        </div>
    </div>
</div>
