<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 02:33:46
  from 'C:\wamp64\www\LPASR\PHP-RM\templates\recherche.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e0ffa64a6f2_39216346',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab31b256a6132ef7cee5a18fdbdf95f6047742df' => 
    array (
      0 => 'C:\\wamp64\\www\\LPASR\\PHP-RM\\templates\\recherche.tpl',
      1 => 1581121550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e0ffa64a6f2_39216346 (Smarty_Internal_Template $_smarty_tpl) {
?><!--si on fait une recherche alors-->
<?php if (!empty($_GET['recherche'])) {?> 
    <!--pour chaque éléments du tableau retourné on affiche une card d'article comme présenté sur la page d'accueil-->
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_result']->value, 'valeur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['valeur']->value) {
?>
        <div class="col-6">
            <div class="card" style="width: 100%;">
                <img src="img/<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
.jpg" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['valeur']->value['titre'];?>
">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['titre'];?>
</h5>
                    <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['texte'];?>
</p>
                    <a href="#" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['valeur']->value['date_fr'];?>
</a>
                    <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
&action=modifier" class="btn btn-primary">Modifier</a>
                    <a href="afficher.php?id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
&action=afficher" class="btn btn-primary">Afficher</a>
                    <a href="supprimer.php?id=<?php echo $_smarty_tpl->tpl_vars['valeur']->value['id'];?>
&action=supprimer" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
