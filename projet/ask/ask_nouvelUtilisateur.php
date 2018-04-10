<?php
require_once "../class/Utilisateur.php";
$U = new Utilisateur($_POST['nom'], $_POST['prenom'], $_POST['age'], $_POST['mail'], $_POST['mdp']);
$U->initSession();
$U->inscription();
//echo($U->getNom());

?>