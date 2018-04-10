<?php

require_once "../class/Livre.php";
$L = new Livre($_POST['titre'], $_POST['auteur'], $_POST['editeur']);
$L->inscription();
echo($L->getTitre());

?>