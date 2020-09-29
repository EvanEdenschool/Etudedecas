<?php
session_start();
require ("../core.php");
$user = Controller::getUtilisateurById($_GET['id']);
echo $user;