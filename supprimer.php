<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';

if (isset($_GET['action']) && isset($_GET['id'])) { //si on a appuyé sur le bouton "Supprimer" et qu'un id est défini alors

    $id = $_GET['id'];//récupération de l'id de l'article à partir de l'url

    $sth = $bdd->prepare("DELETE FROM article where article.id=$id");//on supprime de la table l'article dont l'id est celui récupéré dans l'url
    $sth->bindValue(':id', $id, PDO::PARAM_INT);//sécurisation du paramètre id
    $sth->execute();//on exécute la requête

    $message = '<b>Félicitation</b>, votre article ainsi que ses commentaires ont été supprimés !'; //message de notification affiché sur la page d'accueil lorsqu'un article s'est bien supprimé à la base de données
    $result = 'success'; //pour savoir si la suppression de l'article s'est bien passée ou pas

    declareNotification($message, $result); //on affiche le message

    header("Location: index.php"); //on redirige l'utilsateur à la page d'accueil lorsqu'il a supprimé un article.

    exit(); //fin de l'exécution du script
}
?>

