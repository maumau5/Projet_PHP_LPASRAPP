<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Articles publiés</h1>
            <p class="lead">Bonne lecture !</p>
            <ul class="list-unstyled">
                <!--<li>Bootstrap 4.3.1</li>
                <li>jQuery 3.4.1</li>-->
            </ul>
        </div>
    </div>
    
    <!--Variable super globale $_session-->
    {if isset($smarty.session.notification)}
        
        <!--Notification-->
        <div class="row">
            <div class="col-12">
                <div class="alert alert-{$smarty.session.notification.result} alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {$smarty.session.notification.message}
                </div>
            </div>
        </div>
        
    {/if}
    <div class="row">
        <!--passe en revue le tableau $tab_result. À chaque itération, la valeur de l'élément courant est assignée à $value et le pointeur interne de tableau est avancé d'un élément (ce qui fait qu'à la prochaine itération, on accédera à l'élément suivant).La seconde forme assignera en plus la clé de l'élément courant à la variable $key à chaque itération. -->
        {foreach from=$tab_result item=value} 
            
            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="img/{$value.id}.jpg" alt="{$value.titre}">
                    <div class="card-body">
                        <h5 class="card-title">{$value.titre}</h5>
                        <p class="card-text">{$value.texte}</p>
                        <a href="#" class="btn btn-primary">{$value.date_fr}</a> 
                        
                        <!-- si on est connecté alors -->
                        {if $connecte == true}
                        <a href="article.php?id={$value.id}&action=modifier" class="btn btn-primary">Modifier</a>
                        <a href="afficher.php?id={$value.id}&action=afficher" class="btn btn-primary">Afficher</a>
                        <a href="supprimer.php?id={$value.id}&action=supprimer" class="btn btn-primary">Supprimer</a>
                        {/if}
                    </div>
                </div>
            </div>
        {/foreach}
    </div>

</div>
<div class="row">
    <div class="col-12">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?p={$page_prec}" tabindex="-1">Précédent</a>
                </li>
                
                <!-- pour tous les index d'articles de la page -->
                {for $index = 1 to $nb_total_pages}
                    <li class="page-item {if $page_courante == $index}active{/if}"><a class="page-link" href="?p={$index}">{$index}</a></li>
                {/for}
                <a class="page-link" href="?p={$page_suiv}">Suivant</a>
            </ul>
        </nav>
    </div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
