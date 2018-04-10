<?php
require_once "../class/Utilisateur.php";
$U = new Utilisateur("", "", 0, $_POST['mail'], $_POST['mdp']);
$U->connexion();

?>