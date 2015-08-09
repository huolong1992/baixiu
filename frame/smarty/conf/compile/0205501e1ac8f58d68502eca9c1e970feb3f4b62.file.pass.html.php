<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-23 19:51:54
         compiled from "/var/www/baixiu/index/view/user/pass.html" */ ?>
<?php /*%%SmartyHeaderCode:93590290455b0d53e530481-23648443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0205501e1ac8f58d68502eca9c1e970feb3f4b62' => 
    array (
      0 => '/var/www/baixiu/index/view/user/pass.html',
      1 => 1437652312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93590290455b0d53e530481-23648443',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55b0d53e58af00_50638298',
  'variables' => 
  array (
    'CONTROLLER' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b0d53e58af00_50638298')) {function content_55b0d53e58af00_50638298($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>修改密码</title>
</head>
<body>
<form action="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/passAction" method="post">
旧密码:<input type="password" id="oldPass" name="oldPass"><br/>
新密码:<input type="password" id="newPass" name="newPass"><br/>
<input type="submit" value="确定">
<input type="reset" value="重置">
<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
</form>
</body>
</html><?php }} ?>
