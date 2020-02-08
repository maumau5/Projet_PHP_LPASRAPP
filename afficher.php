<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');


    $id = $_GET['id'];//on récupère l'id de l'article dans l'url
    
    //requête pour afficher l'article avec ses commentaires grâce à une jointure sql :
    $sth = $bdd->prepare("SELECT article.id, "
            ."titre, "
            ."texte, "
            ."pseudo, "
            ."contenu, "
            ."article_id " 
            ."FROM article " 
            ."LEFT JOIN comment ON comment.article_id=article.id "
            ."WHERE article.id=:id");
    
    $sth->bindValue(':id', $id, PDO::PARAM_INT);//sécurisation de la variable id
    
    $sth->execute();//exécution de la requête préparée préalablement
    $article = $sth->fetchAll(PDO::FETCH_ASSOC);// Retourne un tableau contenant toutes les lignes du jeu d'enregistrements 

$smarty = new Smarty(); //on crée un nouvel objet smarty

$smarty->setTemplateDir('template/');//on affecte template comme dossier où seront stockés les fichiers de vue (.tpl)
$smarty->setCompileDir('templates_c/');//on affecte templates_c comme dossier où seront stockés les fichiers de compilation de template

//assignation des valeurs de variables php au template :
$smarty->assign('article', $article);

$smarty->display('templates/afficher.tpl');//on affiche le template afficher.tpl
unset($_SESSION['notification']);//détruit la notification 

exit();
?>