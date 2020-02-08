<?php

/* @var $bdd PDO */
$connecte = FALSE; //on n'est connecté à aucun compte

if (isset($_COOKIE['sid'])) { //si le cookie est déclaré et différent de null alors
    $sid = $_COOKIE['sid'];
    $sth_connexion = $bdd->prepare("SELECT * " //requête permettant de récupérer toutes les données de la table user dont le sid est égal au sid du cookie déclaré
            . "FROM user "
            . "WHERE sid = :sid");
    $sth_connexion->bindValue(':sid', $sid, PDO::PARAM_STR); //on sécurise le paramètre avant l'exécution de la requête
    $sth_connexion->execute(); //on exécute la requête sql
    if ($sth_connexion->rowCount() > 0) { //si la requête renvoie au moins une ligne alors
        $connecte = TRUE; //on est connecté
    }
}

?>