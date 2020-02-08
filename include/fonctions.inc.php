<?php

function print_r2($ma_variable) { //Affiche des informations lisibles pour une variable dans un nivigateur plus facile
    echo '<pre>';
    print_r($ma_variable); //Affiche des informations lisibles pour une variable
    echo '</pre>';

    return true;
}

function declareNotification($message, $result) { //fonction permettant de déclarer le message et le résultat d'une action dans une notification
    $_SESSION['notification']['message'] = $message;
    $_SESSION['notification']['result'] = $result;

    return true;
}

function countArticles($bdd) { //fonction permettant de compter le nombre d'articles que contient la base de données
    /* @var $bdd PDO */
    $sth = $bdd->prepare("SELECT COUNT(*) as total "
            . "FROM article "
            . "WHERE publie = :publie");
    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function returnIndex($page_courante, $nb_articles_par_page) { //on retourne l'index de départ pour l'affichage des articles dans les pages (pour la pagination du blog)
    $index_depart = ($page_courante - 1) * $nb_articles_par_page;

    return $index_depart;
}

?>