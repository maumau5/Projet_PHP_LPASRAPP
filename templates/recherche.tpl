<!--si on fait une recherche alors-->
{if !empty($smarty.get.recherche)} 
    <!--pour chaque éléments du tableau retourné on affiche une card d'article comme présenté sur la page d'accueil-->
    {foreach from=$tab_result item=valeur}
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img src="img/{$valeur.id}.jpg" class="card-img-top" alt="{$valeur.titre}">
                <div class="card-body">
                    <h5 class="card-title">{$valeur.titre}</h5>
                    <p class="card-text">{$valeur.texte}</p>
                    <a href="#" class="btn btn-primary">{$valeur.date_fr}</a>
                    <a href="article.php?id={$valeur.id}&action=modifier" class="btn btn-primary">Modifier</a>
                    <a href="afficher.php?id={$valeur.id}&action=afficher" class="btn btn-primary">Afficher</a>
                    <a href="supprimer.php?id={$valeur.id}&action=supprimer" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
        </div>
    {/foreach}
{/if}