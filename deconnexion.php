<?php

setcookie('sid', '', -1); //définit un cookie qui sera envoyé avec le reste des en-têtes HTTP. 

header("Location: index.php"); //renvoi à la page d'accueil du blog
exit();
?>