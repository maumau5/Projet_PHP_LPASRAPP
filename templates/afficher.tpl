<!-- Page Content -->

<!--code Javascript qui permet la vérification du remplissage des champs contenu du commentaire et email de l'utilisateur-->
<script>
    function isEmpty(){ 
        var str = document.forms['comment_form'].email.value;
        var str2 = document.forms['comment_form'].contenu.value;
        if( !str.replace(/\s+/, '').length || !str2.replace(/\s+/, '').length ) { //si le champ email ou contenu ou les deux sont vides alors on affiche une fenêtre indiquant un message d'alerte
            alert( "Votre adresse mail et votre commentaire ne doivent pas être vides !" );
            return false;
        }
    }
</script>
<div class="container">
    
    <!--Variable super globale $_session-->
    {if isset($smarty.session.notification)}
        
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
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">{$article[0]['titre']}</h1>
        </div>
    </div>
    <div class="card mx-auto" style="width: 100%;">
        <img style="width: 30%; margin: 0 auto;" class="card-img-top" src="img/{$article[0]['id']}.jpg" alt="{$article[0]['titre']}">
        <div class="card-body">
            <p class="card-text">{$article[0]['texte']}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Ajouter un commentaire sur cet article</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form name="comment_form" method="POST" action="commentaire.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pseudo">Votre pseudo</label>
                    <input type="texte" required class="form-control" id="pseudo" name="pseudo" placeholder="Entrer ici votre pseudo">
                </div>
                <div class="form-group">
                    <label for="email">Votre adresse mail</label>
                    <input type="email" required class="form-control" id="email" name="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="contenu">Votre commentaire</label>
                    <textarea class="form-control" id="contenu" rows="5" cols="100" name="contenu" placeholder="Entrer ici le contenu de votre commentaire"></textarea>         
                </div>
                
                <!--Au click du bouton on vérifie le remplissage des champs email et contenu avec la fonction javascript du haut du fichier-->
                <button onClick="return isEmpty()" type="submit" class="btn btn-primary" name="submit" value="bouton">Envoyer</button>
                <input type="hidden" name="article_id" value="{$article[0]['id']}">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Commentaires sur cet article</h1>
        </div>
    </div>
           
    {if $article[0]['contenu'] == NULL}
        <h2 class="mt-5 text-center">Il n'y a pas encore de commentaire sur cet article</h2>
    {else}
        {foreach from=$article item=value}
            <div class="card mx-auto" style="width: 100%;">
                <div class="card-body" style="background-color: lightblue;">
                    <strong class="card-text">{$value.pseudo}</strong>
                </div>
                <div class="card-body" style="background-color: lightblue;">
                    <p class="card-text">{$value.contenu}</p>
                </div>
            </div>
        {/foreach}
    {/if} 
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>