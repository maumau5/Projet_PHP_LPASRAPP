<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:24:54
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0de6501d27_06794705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9954c6d2c87a3cba507d6ba270ff344254fe54c1' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\connexion.tpl',
      1 => 1581121607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0de6501d27_06794705 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Connexion</h1>
        </div>
    </div>
    <!--On affiche un formulaire de connexion à un compte créé sur le blog (identifiant et mot de passe à renseigner)-->
    <div class="row">
        <div class="col-12">
            <form method="POST" action="connexion.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Votre adresse mail</label>
                    <input type="email" required class="form-control" id="email" name="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="mdp">Votre mot de passe</label>
                    <input type="password" required class="form-control" id="texte" rows="3" name="mdp" placeholder="Entrer ici votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="bouton">Connexion</button>
            </form>
        </div>
    </div>


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
