<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-10 11:04:47
         compiled from "/var/www/baixiu/blog/view/common/header.html" */ ?>
<?php /*%%SmartyHeaderCode:156830304155c72e0eb12fc6-76693257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84fbe89386278558e308992edf612f2640368129' => 
    array (
      0 => '/var/www/baixiu/blog/view/common/header.html',
      1 => 1439120756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156830304155c72e0eb12fc6-76693257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55c72e0eb26861_88942233',
  'variables' => 
  array (
    'title' => 0,
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c72e0eb26861_88942233')) {function content_55c72e0eb26861_88942233($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/css/style.css">
</head>
<body>
<header>
	<nav id="nav">
		<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
">我的博客</a></li>
		</ul>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/js/silder.js"><?php echo '</script'; ?>
><!--获取当前页导航 高亮显示标题-->
	</nav>
</header><?php }} ?>
