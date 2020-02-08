<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:31:42
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\afficher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0f7e336743_68883839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6109761e1878b3cf38af6d5f0645088b415e034f' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\afficher.tpl',
      1 => 1581123737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0f7e336743_68883839 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->

<!--code Javascript qui permet la vérification du remplissage des champs contenu du commentaire et email de l'utilisateur-->
<?php echo '<script'; ?>
>
    function isEmpty(){ 
        var str = document.forms['comment_form'].email.value;
        var str2 = document.forms['comment_form'].contenu.value;
        if( !str.replace(/\s+/, '').length || !str2.replace(/\s+/, '').length ) { //si le champ email ou contenu ou les deux sont vides alors on affiche une fenêtre indiquant un message d'alerte
            alert( "Votre adresse mail et votre commentaire ne doivent pas être vides !" );
            return false;
        }
    }
<?php echo '</script'; ?>
>
<div class="container">
    
    <!--Variable super globale $_session-->
    <?php if (isset($_SESSION['notification'])) {?>
        
        <div class="row">
            <div class="col-12">
                <div class="alert alert-<?php echo $_SESSION['notification']['result'];?>
 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $_SESSION['notification']['message'];?>

                </div>
            </div>
        </div>
        
    <?php }?>
    
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5"><?php echo $_smarty_tpl->tpl_vars['article']->value[0]['titre'];?>
</h1>
        </div>
    </div>
    <div class="card mx-auto" style="width: 100%;">
        <img style="width: 30%; margin: 0 auto;" class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['article']->value[0]['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value[0]['titre'];?>
">
        <div class="card-body">
            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['article']->value[0]['texte'];?>
</p>
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
                <input type="hidden" name="article_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value[0]['id'];?>
">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Commentaires sur cet article</h1>
        </div>
    </div>
           
    <?php if ($_smarty_tpl->tpl_vars['article']->value[0]['contenu'] == NULL) {?>
        <h2 class="mt-5 text-center">Il n'y a pas encore de commentaire sur cet article</h2>
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
            <div class="card mx-auto" style="width: 100%;">
                <div class="card-body" style="background-color: lightblue;">
                    <strong class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['pseudo'];?>
</strong>
                </div>
                <div class="card-body" style="background-color: lightblue;">
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['contenu'];?>
</p>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?> 
</div>

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
