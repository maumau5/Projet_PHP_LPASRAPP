<?php

try { //si cela fonctionne exécuter le code suivant
    $bdd = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', 'bruh'); //connexion à la base de données
    $bdd->exec("set names utf8"); // on met les noms en encodage utf8
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Configure le rapport d'erreur en emission d'exceptions
} catch (Exception $ex) { //sinon afficher le message d'erreur suivant
    die('Erreur : ' . $ex->getMessage());
}
?>
