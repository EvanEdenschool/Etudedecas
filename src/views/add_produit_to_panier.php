<?php
    require "../core.php";
    session_start();
    if(is_numeric($_GET['id_p']) && $_GET['id_p'] != "") {
        controller::addProduitToPanier();
    }