<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-18 21:18:37
         compiled from "/var/www/html/app/app/templates/adminarea/errors/box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2141319232546ba99d13ca23-42356107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afc19f240868aabc1d07920d1b2ed0859755a8cd' => 
    array (
      0 => '/var/www/html/app/app/templates/adminarea/errors/box.tpl',
      1 => 1411631970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2141319232546ba99d13ca23-42356107',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'debug' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_546ba99d2e2341_25834339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ba99d2e2341_25834339')) {function content_546ba99d2e2341_25834339($_smarty_tpl) {?><div>
    <span class="label label-terminated" style="background-color: #C43C35;">There was an error during the work of the application :( Please contact ModulesGarden immediately.</span>
</div>

<p style="margin: 10px 0;">You can paste a code from the field below to send and paste it into the Submit Ticket Form at our page. That will help us to faster find a cause of the problem.</p>

<?php if ($_smarty_tpl->tpl_vars['debug']->value==1) {?>
    <h2>The error message is: <em><?php echo $_smarty_tpl->tpl_vars['error']->value->getMessage();?>
</em></h2>
    <cite>
        <?php echo nl2br($_smarty_tpl->tpl_vars['error']->value->getTraceAsString());?>

    </cite>
<?php } else { ?>
    <cite style="word-break: break-all">
        <?php echo base64_encode($_smarty_tpl->tpl_vars['error']->value);?>

    </cite>
<?php }?><?php }} ?>
