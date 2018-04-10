<?php

require_once "../class/Livre.php";
$L = new Livre($_POST['titre'], $_POST['auteur'], $_POST['editeur'],$_POST['prix']);
$L->ajout();
//echo($L->getTitre());

?>