<?php
require_once "../class/Utilisateur.php";
$U = new Utilisateur($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['adresse']);
$U->initSession();
$U->inscription();
//echo($U->getNom());

?>