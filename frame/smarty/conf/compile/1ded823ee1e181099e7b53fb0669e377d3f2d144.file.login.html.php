<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-24 22:05:09
         compiled from "/var/www/baixiu/index/view/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:140261260155af8969ab33e7-32706681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ded823ee1e181099e7b53fb0669e377d3f2d144' => 
    array (
      0 => '/var/www/baixiu/index/view/user/login.html',
      1 => 1437746501,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140261260155af8969ab33e7-32706681',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55af8969c7d3a7_32424256',
  'variables' => 
  array (
    'CONTROLLER' => 0,
    'rd' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55af8969c7d3a7_32424256')) {function content_55af8969c7d3a7_32424256($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
 
<body>
	<!--main-->
	<div class="main">
		<div class="user">
			<img src="images/user.png" alt="">
		</div>
		<div class="login">
			<div class="inset">
				<form action="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/loginAction" method="post">
				         	<div>
						<span><label>用户名/邮箱</label></span>
						<span><input type="text" class="textbox" id="active" name="userOrEmail"></span>
					</div>
					<div>
						<span><label>密码</label></span>
						<span><input type="password" class="password" name="password"></span>
					</div>
					<div>
						<span><label>验证码</label></span>
						<span><input type="text" class="password" name="verify"><img src="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verify?rd=<?php echo $_smarty_tpl->tpl_vars['rd']->value;?>
" onclick="javascript:this.src+='&rand='+Math.random()"></span>
					</div>
					<div class="sign">
						<div class="submit">
							<input type="submit" id="login" name="login" value="登录" >
						</div>
						<div class="clear"> </div>
					</div>
					<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
				</form>
			</div>
		</div>
	</div>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	$(document).ready(function(){

	});
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
