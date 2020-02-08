<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php'; //identique à require mis à part que PHP vérifie si le fichier a déjà été inclus, et si c'est le cas, ne l'inclut pas une deuxième fois. 
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');

/* @var $bdd PDO */

$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1; //si p n'est pas vide alors il prend la valeur de $_GET['p'] sinon il prend la valeur 1

$nb_total_articles = countArticles($bdd); //on compte le nombre d'articles de la base de données avec la fonction créée dans le fichier de fonctions

$index_depart = returnIndex($page_courante, _nb_articles_par_page_); //on retourne l'index de départ pour la pagination du blog et l'affichage des pages d'articles du blog

$nb_total_pages = ceil($nb_total_articles / _nb_articles_par_page_); //ceil arrondit au nombre supérieur, floor() fait l'inverse

$sth = $bdd->prepare("SELECT id,"//on prépare la requête à exécuter
        . "titre, "
        . "texte, "
        . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
        . "publie "
        . "FROM article "
        . "WHERE publie = :publie "
        . "LIMIT :index_depart, :nb_articles_par_page");
$sth->bindValue(":publie", 1, PDO::PARAM_BOOL); //fonction pdo qui permet de sécuriser le paramètre avant d'exécuter la requête
$sth->bindValue(":index_depart", $index_depart, PDO::PARAM_INT);
$sth->bindValue(":nb_articles_par_page", _nb_articles_par_page_, PDO::PARAM_INT);
$sth->execute(); //on exécute la requête préparée juste avant

$tab_result = $sth->fetchAll(PDO::FETCH_ASSOC); //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements + Récupère une ligne de résultat sous forme de tableau associatif

$smarty = new Smarty();//on crée un nouvel objet smarty

$smarty->setTemplateDir('template/');//on affecte template comme dossier où seront stockés les fichiers de vue (.tpl)
$smarty->setCompileDir('templates_c/');//on affecte templates_c comme dossier où seront stockés les fichiers de compilation de template

$page_suiv = $page_courante + 1;
$page_prec = $page_courante - 1;

//assignation des valeurs de variables php au template :
$smarty->assign('connecte', $connecte);
$smarty->assign('tab_result', $tab_result);
$smarty->assign('nb_total_pages', $nb_total_pages);
$smarty->assign('page_courante', $page_courante);
$smarty->assign('page_suiv', $page_suiv);
$smarty->assign('page_prec', $page_prec);

include_once 'include/header.inc.php';
$smarty->display('templates/index.tpl');//on affiche le template index.tpl
unset($_SESSION['notification']);//détruit la notification

exit();
?>
