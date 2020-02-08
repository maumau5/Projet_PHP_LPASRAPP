<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:15:57
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0bcddfd5d5_56194248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e07e543fc99ce97f232a14b582afdbfe2b830ff' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\index.tpl',
      1 => 1581123068,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0bcddfd5d5_56194248 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
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
    <?php if (isset($_SESSION['notification'])) {?>
        
        <!--Notification-->
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
        <!--passe en revue le tableau $tab_result. À chaque itération, la valeur de l'élément courant est assignée à $value et le pointeur interne de tableau est avancé d'un élément (ce qui fait qu'à la prochaine itération, on accédera à l'élément suivant).La seconde forme assignera en plus la clé de l'élément courant à la variable $key à chaque itération. -->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_result']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?> 
            
            <div class="col-6">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                        <a href="#" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</a> 
                        
                        <!-- si on est connecté alors -->
                        <?php if ($_smarty_tpl->tpl_vars['connecte']->value == true) {?>
                        <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&action=modifier" class="btn btn-primary">Modifier</a>
                        <a href="afficher.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&action=afficher" class="btn btn-primary">Afficher</a>
                        <a href="supprimer.php?id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&action=supprimer" class="btn btn-primary">Supprimer</a>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?p=<?php echo $_smarty_tpl->tpl_vars['page_prec']->value;?>
" tabindex="-1">Précédent</a>
                </li>
                
                <!-- pour tous les index d'articles de la page -->
                <?php
$_smarty_tpl->tpl_vars['index'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int) ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? $_smarty_tpl->tpl_vars['nb_total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0) {
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++) {
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration === 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration === $_smarty_tpl->tpl_vars['index']->total;?>
                    <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page_courante']->value == $_smarty_tpl->tpl_vars['index']->value) {?>active<?php }?>"><a class="page-link" href="?p=<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                <?php }
}
?>
                <a class="page-link" href="?p=<?php echo $_smarty_tpl->tpl_vars['page_suiv']->value;?>
">Suivant</a>
            </ul>
        </nav>
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

</html>
<?php }
}
