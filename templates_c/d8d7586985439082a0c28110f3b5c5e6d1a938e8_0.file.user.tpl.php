<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:30:50
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0f4aed49f9_36011200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8d7586985439082a0c28110f3b5c5e6d1a938e8' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\user.tpl',
      1 => 1581122859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0f4aed49f9_36011200 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Inscription d'un utilisateur</h1>
        </div>
    </div>
    <!--formulaire d'inscription d'un utilisateur au blog -->
    <div class="row">
        <div class="col-12">
            <form method="POST" action="user.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Votre nom</label>
                    <input type="text" required class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prénom</label>
                    <input type="text" required class="form-control" id="prenom" name="prenom">
                </div>
                <div class="form-group">
                    <label for="email">Votre adresse mail</label>
                    <input type="email" required class="form-control" id="email" name="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="mdp">Votre mot de passe</label>
                    <input type="password" required class="form-control" id="texte" rows="3" name="mdp" placeholder="Entrer ici votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="bouton">Inscription</button>
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
