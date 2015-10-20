<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-18 21:18:37
         compiled from "/var/www/html/app/app/templates/adminarea/base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1935673974546ba99d2ee529-35481899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8c806bb9537c408053d529a69586af348f43c5b' => 
    array (
      0 => '/var/www/html/app/app/templates/adminarea/base.tpl',
      1 => 1411631970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1935673974546ba99d2ee529-35481899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addon' => 0,
    'element' => 0,
    'page' => 0,
    'subpage' => 0,
    'subelement' => 0,
    'isError' => 0,
    'messages' => 0,
    'message' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_546ba99d3e8b56_74335588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ba99d3e8b56_74335588')) {function content_546ba99d3e8b56_74335588($_smarty_tpl) {?><!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="http://html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
<![endif]-->
<!--[if IE 7]>
  <link rel="stylesheet" href="assets/css/font-awesome-ie7.css">
<![endif]-->

<div class="body" data-target=".body" data-spy="scroll" data-twttr-rendered="true" id="mg-wrapper">
    <div id="mg-content" class="">
        <div id="top-bar">
            <div id="module-name">
                <h2><?php echo $_smarty_tpl->tpl_vars['addon']->value->name;?>
</h2>
                <!--<h4><?php echo $_smarty_tpl->tpl_vars['addon']->value->getSiteTitle();?>
</h4>-->
            </div>
            <ul id="top-nav">
                <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['addon']->value->menu(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
 $_smarty_tpl->tpl_vars['page']->value = $_smarty_tpl->tpl_vars['element']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['element']->value['submenu']) {?>
                        <li class="dropdown-toggle">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['addon']->value->url($_smarty_tpl->tpl_vars['page']->value);?>
" class="dropdown-toggle" data-toggle="dropdown" role="button" id="menu-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><i class="icon-<?php echo $_smarty_tpl->tpl_vars['element']->value['icon'];?>
"></i><?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>
<i class="icon-caret-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                                <?php  $_smarty_tpl->tpl_vars['subelement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subelement']->_loop = false;
 $_smarty_tpl->tpl_vars['subpage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['element']->value['submenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subelement']->key => $_smarty_tpl->tpl_vars['subelement']->value) {
$_smarty_tpl->tpl_vars['subelement']->_loop = true;
 $_smarty_tpl->tpl_vars['subpage']->value = $_smarty_tpl->tpl_vars['subelement']->key;
?>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['addon']->value->url($_smarty_tpl->tpl_vars['page']->value,$_smarty_tpl->tpl_vars['subpage']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['subelement']->value['title'];?>
</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['addon']->value->url($_smarty_tpl->tpl_vars['page']->value);?>
"><i class="icon-<?php echo $_smarty_tpl->tpl_vars['element']->value['icon'];?>
"></i><?php echo $_smarty_tpl->tpl_vars['element']->value['title'];?>
</a></li>
                    <?php }?>
                <?php } ?>
            </ul>

            <a class="slogan nblue-box visible-desktop hidden-tablet" href="http://www.modulesgarden.com" target="_blank" alt="ModulesGarden Custom Development">
                <span class="mg-logo"></span>
                <small>We are here to help you, just click!</small>
            </a>

        </div><!-- end of TOP BAR -->

        <div class="inner">
            <?php if (!isset($_smarty_tpl->tpl_vars['isError']->value)||$_smarty_tpl->tpl_vars['isError']->value!=1) {?>
            <h2 class="section-heading">
                <i class="icon-<?php echo $_smarty_tpl->tpl_vars['addon']->value->getSiteIcon();?>
"></i> <a href="<?php echo addon_url($_GET['modpage']);?>
"><?php echo $_smarty_tpl->tpl_vars['addon']->value->getSiteTitle();?>
</a>
            </h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['addon']->value->url($_smarty_tpl->tpl_vars['addon']->value->defaultPage[0]);?>
"><i class="icon icon-home"></i></a></li>
                <?php if ($_smarty_tpl->tpl_vars['addon']->value->isSubpage()) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['addon']->value->url($_GET['modpage']);?>
"><?php echo $_smarty_tpl->tpl_vars['addon']->value->getSiteTitle();?>
</a></li>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['addon']->value->getSubpageTitle();?>
</li>
                <?php } else { ?>
                <li class="active"><?php echo $_smarty_tpl->tpl_vars['addon']->value->getSiteTitle();?>
</li>
                <?php }?>
            </ol>
            
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value)&&!empty($_smarty_tpl->tpl_vars['messages']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
                <div class="alert alert-block alert-<?php echo $_smarty_tpl->tpl_vars['message']->value['status'];?>
">
                     <h4 style="margin: 0 0 5px 0;"><?php if ($_smarty_tpl->tpl_vars['message']->value['status']=='error') {?>Problem occured!<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['status']=='success') {?>Success!<?php }?></h4> 
                    <?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
 <button type="button" class="close" data-dismiss="alert">&times;</button></div>
            <?php } ?>
            <?php }?>
            <?php } else { ?>
                <h2 class="section-heading">
                    <i class="icon-warning-sign"></i> <a href="<?php echo addon_url($_GET['modpage']);?>
">Ooops! Something bad probably just happend.</a>
                </h2>
            <?php }?>
            
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div><!-- end of INNER -->
        <div class="overlay hide">
        </div>
    </div><!-- end of CONTENT -->
</div><?php }} ?>
