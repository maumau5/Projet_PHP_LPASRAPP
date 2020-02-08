<?php

//on inclut et exécute les fichiers spécifiés en argument
require_once 'config/init.conf.php';
require_once 'include/fonctions.inc.php';
require_once 'config/bdd.conf.php';
require_once 'config/connexion.conf.php';
include_once 'include/header.inc.php';
require_once('libs/Smarty.class.php');

if (isset($_GET['recherche'])) {
    /* @var $bdd PDO */

    $page_courante = !empty($_GET['p']) ? $_GET['p'] : 1; //si p n'est pas vide alors page_courante est égale à p sinon elle est égale à 1

    $nb_total_articles = countArticles($bdd); //nombre total d'articles dans la base de données calculé grâce à la fonction appelée dans fonctions.inc.php

    $index_depart = returnIndex($page_courante, _nb_articles_par_page_);

    $nb_total_pages = ceil($nb_total_articles / _nb_articles_par_page_);

    $select_articles = "SELECT " //requête pour afficher les informations d'un article (s'il est publié) contenant dans son titre ou dans son texte le mot recherché, dans la limite des articles de la page
            . "id, "
            . "titre, "
            . "texte, "
            . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
            . "publie "
            . "FROM article "
            . "WHERE publie = :publie "
            . "AND (titre LIKE :recherche OR texte LIKE :recherche) "
            . "LIMIT :index_depart, :nb_articles_par_page";

    $sth = $bdd->prepare($select_articles);
    $sth->bindValue(":publie", 1, PDO::PARAM_BOOL); //fonction pdo qui permet de sécuriser le paramètre avant d'exécuter la requête
    $sth->bindValue(":index_depart", $index_depart, PDO::PARAM_INT);
    $sth->bindValue(":nb_articles_par_page", _nb_articles_par_page_, PDO::PARAM_INT);
    $sth->bindValue(":recherche", '%' . $_GET['recherche'] . '%', PDO::PARAM_STR);
    $sth->execute(); //on exécute la requête préparée juste avant

    $tab_result = $sth->fetchAll(PDO::FETCH_ASSOC);
}

$smarty = new Smarty();//on crée un nouvel objet smarty

$smarty->setTemplateDir('template/');//on affecte template comme dossier où seront stockés les fichiers de vue (.tpl)
$smarty->setCompileDir('templates_c/');//on affecte templates_c comme dossier où seront stockés les fichiers de compilation de template

//assignation des valeurs de variables php au template :
$smarty->assign('tab_result', $tab_result);

$smarty->display('templates/recherche.tpl');//on affiche le template recherche.tpl
unset($_SESSION['notification']);//détruit la notification

exit();
?>