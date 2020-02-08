<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');

if (!empty($_POST['submit'])) { //si le formulaire a été soumis alors

    //récupération des données envoyées via le formulaire d'ajout de commentaire :
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $contenu = $_POST['contenu'];
    $article_id = $_POST['article_id'];

    //requête sql permettant d'ajouter un commentaire à la base de données comment grâce aux données récupérées par les champs du formulaire
    $sth = $bdd->prepare("INSERT INTO comment "
            . "(pseudo, email, contenu, article_id) "
            . "VALUES (:pseudo, :email, :contenu, :article_id)");

    //sécurisation des paramètres :
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':contenu', $contenu, PDO::PARAM_STR);
    $sth->bindValue(':article_id', $article_id, PDO::PARAM_INT);

    $sth->execute();//exécution de la requête sql

    $message = '<b>Félicitation</b>, votre commentaire est ajouté !'; //message de notification affiché sur la page d'accueil lorsqu'un commentaire s'est bien ajouté à la base de données
    $result = 'success'; //pour savoir si l'envoi du commentaire s'est bien passé ou pas

    declareNotification($message, $result);//affichage du message de notification

    header("Location: afficher.php?id=$article_id&action=afficher"); //on redirige l'utilisateur à la page d'affichage de l'article auquel on a ajouté un commentaire

    exit(); //fin de l'exécution du script
}
?>