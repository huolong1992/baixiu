<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-24 18:30:39
         compiled from "/var/www/baixiu/index/view/user/index.html" */ ?>
<?php /*%%SmartyHeaderCode:155296689155af948a8f75e6-34138336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05281c810ad897c2709b97837955dd6a38f7051a' => 
    array (
      0 => '/var/www/baixiu/index/view/user/index.html',
      1 => 1437733810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155296689155af948a8f75e6-34138336',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55af948a919044_36171213',
  'variables' => 
  array (
    'username' => 0,
    'face' => 0,
    'CONTROLLER' => 0,
    'email' => 0,
    'phone' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55af948a919044_36171213')) {function content_55af948a919044_36171213($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
</head>
<body>
用户名：<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
<br/>
头像：<img src="<?php echo $_smarty_tpl->tpl_vars['face']->value;?>
">点击修改<form action="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/faceAction" method="post" enctype="multipart/form-data"><input type="file" name="face"><input type="submit" value="确认"></form><br/>
邮箱：<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
<br/>
手机：<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
<br/>
博文：<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
<br/>
<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/pass">修改密码</a><br/>
<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/logout">退出>></a>
</body>
</html><?php }} ?>
