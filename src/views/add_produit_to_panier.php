<?php
    require "../core.php";
    session_start();
    if((is_numeric($_GET['id_p']) && $_GET['id_p'] != "") && (is_numeric($_GET['quantite']) && $_GET['quantite'] != "")) {
        controller::addProduitToPanier();
    }