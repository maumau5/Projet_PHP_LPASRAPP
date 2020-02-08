<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:16:02
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0bd287a025_37269107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0860057b7aca485cf33c4823db6d48f53fc1bda4' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\article.tpl',
      1 => 1581123285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0bd287a025_37269107 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_GET['action']) && isset($_GET['id'])) {?> 
<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Modifier un article</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="article.php?action=modifier&id=<?php echo $_GET['id'];?>
" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>
">
                    <input type="hidden" name="action" value="<?php echo $_GET['action'];?>
">
                    <div class="form-group">
                        <label for="titre">Le titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
">
                    </div>
                    <div class="form-group">
                        <label for="texte">Le contenu de l'article</label>
                        <textarea class="form-control" id="texte" rows="10" cols="100" name="texte" placeholder="Entrer ici le contenu de l'article"><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>
</textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">L'image de mon article</label>
                        <input type="file" class="form-control-file" id="img" name="img"">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="publie" name="publie" value=""<?php if ($_smarty_tpl->tpl_vars['article']->value['publie'] == 1) {?> checked <?php }?>>
                        <label class="form-check-label" for="publie">Article publié ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="bouton">Modifier mon article</button>
                </form>
            </div>
        </div>
    </div>
<?php } else { ?>
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
<?php }?>
    
<!-- Bootstrap core JavaScript -->
<?php echo '<script'; ?>
 src="vendor/jquery/jquery.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
