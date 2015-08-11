<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-11 21:48:17
         compiled from "/var/www/baixiu/blog/view/user/index.html" */ ?>
<?php /*%%SmartyHeaderCode:38564026855b78a35214a58-69240017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '396bbc1c27765b05cda55a6e0f8ed9b52dbc9b6d' => 
    array (
      0 => '/var/www/baixiu/blog/view/user/index.html',
      1 => 1439120756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38564026855b78a35214a58-69240017',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55b78a352eae87_91112178',
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
<?php if ($_valid && !is_callable('content_55b78a352eae87_91112178')) {function content_55b78a352eae87_91112178($_smarty_tpl) {?><!DOCTYPE html>
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
