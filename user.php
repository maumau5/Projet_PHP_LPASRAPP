<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');

/* @var $bdd PDO */

if (!empty(filter_input(INPUT_POST, 'submit'))) { //si on a appuyé sur le bouton de soumission du formulaire alors
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $email = filter_input(INPUT_POST, 'email');
    $mdp = sha1(filter_input(INPUT_POST, 'mdp')); //cryptage du mot de passe

    $sth = $bdd->prepare("INSERT INTO user " //on prépare la requête d'insertion de l'article dans la base de données
            . "(nom, prenom, email, mdp) "
            . "VALUES (:nom, :prenom, :email, :mdp)");
    $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);

    $sth->execute(); //on exécute la requête préparée au préalable (retourne true si tout s'est bien passé, sinon erreur)

    $message = '<b>Félicitation</b>, votre compte a été créé !'; //message de notification affiché sur la page d'accueil lorsqu'un article s'est bien ajouté à la base de données
    $result = 'success'; //pour savoir si l'envoi de l'article s'est bien passé ou pas

    declareNotification($message, $result);

    header("Location: index.php"); //on redirige l'utilisateur à la page d'accueil lorsqu'il a inséré un article.

    exit(); //fin de l'exécution du script
}

$smarty = new Smarty();//on crée un nouvel objet smarty

$smarty->setTemplateDir('template/');//on affecte template comme dossier où seront stockés les fichiers de vue (.tpl)
$smarty->setCompileDir('templates_c/');//on affecte templates_c comme dossier où seront stockés les fichiers de compilation de template

$smarty->display('templates/user.tpl');//on affiche le template user.tpl
unset($_SESSION['notification']);//détruit la notification

exit();
?>