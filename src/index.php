<?php
session_start();
require "core.php";
?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
    <script src="../js/index.js"></script>
    

  </head>
  <body>
          <?php
            include ("views/header.php");
          ?>
          <?php
            include ("views/nouveautes.php");
          ?>
          <?php
            include ("views/produits.php");
          ?>
          <?php
            include ("views/slider.php");
          ?>
          <?php
            include ("views/about.php");
          ?>  
          <?php
            include ("views/footer.php");
          ?>  
  </body>
</html>
