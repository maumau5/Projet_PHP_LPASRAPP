<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');

if (!empty($_POST['submit'])) { //si on a appuyé sur le bouton de soumission du formulaire alors
    $email = filter_input(INPUT_POST, 'email');
    $mdp = sha1(filter_input(INPUT_POST, 'mdp')); //Calcule le sha1 d'une chaîne de caractères, ici le mot de passe

    $sth = $bdd->prepare("SELECT * " //on prépare la requête d'insertion de l'article dans la base de données
            . "FROM user "
            . "WHERE email = :email AND mdp = :mdp");
    $sth->bindValue(':email', $email, PDO::PARAM_STR); //sécurisation des paramètres
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);

    $sth->execute(); //on exécute la requête préparée au préalable (retourne true si tout s'est bien passé, sinon erreur)

    if ($sth->rowCount() > 0) {
        //la connexion est OK
        $donnees = $sth->fetch(PDO::FETCH_ASSOC);
        $sid = $donnees['email'] . time();
        $sid_hache = md5($sid);

        setcookie('sid', $sid_hache, time() + 3600); //on déclare un cookie sid

        $sth_update = $bdd->prepare("UPDATE user " 
                . "SET sid = :sid "
                . "WHERE id = :id");

        $sth_update->bindValue(':sid', $sid_hache, PDO::PARAM_STR);
        $sth_update->bindValue(':id', $donnees['id'], PDO::PARAM_INT);

        $result_connexion = $sth_update->execute();

        /*         * *** NOTIFICATIONS **** */
        if ($result_connexion == TRUE) {
            $_SESSION['notification']['result'] = 'success';
            $_SESSION['notification']['message'] = '<b>Felicitations ! </b> Vous êtes connecté.';
        } else {
            $_SESSION['notification']['result'] = 'danger';
            $_SESSION['notification']['message'] = '<b>Attention !</b> Une erreur s\'est produite. ';
        }

        //Redirection vers l'accueil
        header("location: index.php");
        exit();
    } else {
        //la connexion est refusée
        /*         * *** NOTIFICATIONS **** */

        $_SESSION['notification']['result'] = 'danger';
        $_SESSION['notification']['message'] = '<b>Attention !</b> Veuillez vérifier vos identifiant et mot de passe.';

        //Redirection vers l'accueil
        header("location: connexion.php");
        exit();
    }
} else {

    $smarty = new Smarty();//crée un nouvel objet Smarty

    $smarty->setTemplateDir('template/');//on affecte template comme dossier où seront stockés les fichiers de vue (.tpl)
    $smarty->setCompileDir('templates_c/');//on affecte templates_c comme dossier où seront stockés les fichiers de compilation de template

    $smarty->display('templates/connexion.tpl');//on affiche le template connexion.tpl
    unset($_SESSION['notification']);//détruit la notification
    exit();
}
?>