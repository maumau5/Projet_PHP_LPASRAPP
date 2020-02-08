{if isset($smarty.get.action) && isset($smarty.get.id)} 
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Modifier un article</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="article.php?action=modifier&id={$smarty.get.id}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{$smarty.get.id}">
                    <input type="hidden" name="action" value="{$smarty.get.action}">
                    <div class="form-group">
                        <label for="titre">Le titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{$article.titre}">
                    </div>
                    <div class="form-group">
                        <label for="texte">Le contenu de l'article</label>
                        <textarea class="form-control" id="texte" rows="10" cols="100" name="texte" placeholder="Entrer ici le contenu de l'article">{$article.texte}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">L'image de mon article</label>
                        <input type="file" class="form-control-file" id="img" name="img"">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="publie" name="publie" value=""{if $article.publie == 1} checked {/if}>
                        <label class="form-check-label" for="publie">Article publié ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="bouton">Modifier mon article</button>
                </form>
            </div>
        </div>
    </div>
{else}
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Ajouter un article</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="article.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titre">Le titre</label>
                        <input type="text" class="form-control" id="titre" name="titre">
                    </div>
                    <div class="form-group">
                        <label for="texte">Le contenu de l'article</label>
                        <input type="textarea" class="form-control" id="texte" rows="3" name="texte" placeholder="Entrer ici le contenu de l'article">
                    </div>
                    <div class="form-group">
                        <label for="img">L'image de mon article</label>
                        <input type="file" class="form-control-file" id="img" name="img">
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="publie" name="publie">
                        <label class="form-check-label" for="publie">Article publié ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="bouton">Soumettre mon article</button>
                </form>
            </div>
        </div>
    </div>
{/if}
    
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>