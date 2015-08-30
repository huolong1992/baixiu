<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-28 10:25:48
         compiled from "/var/www/baixiu/blog/view/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:211582427655b75ee8362004-59224200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '519bf19e31811464e816392cccb69b7b9e311f2a' => 
    array (
      0 => '/var/www/baixiu/blog/view/user/login.html',
      1 => 1440728745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211582427655b75ee8362004-59224200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55b75ee8420ed6_40103466',
  'variables' => 
  array (
    'MIN' => 0,
    'MIN_PUBLIC' => 0,
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
    'userOrEmail' => 0,
    'rd' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b75ee8420ed6_40103466')) {function content_55b75ee8420ed6_40103466($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['MIN']->value;?>
/?f=<?php echo $_smarty_tpl->tpl_vars['MIN_PUBLIC']->value;?>
/css/login.css&v=1.0">
</head>
 
<body>
	<!--main-->
	<div class="main">
		<div class="user">
			<img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/images/user.png" alt="">
		</div>
		<div class="login">
			<div class="inset">
				<form action="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/loginAction" method="post">
				         	<div>
						<span><label>用户名/邮箱</label><label id="error-user"></label></span>
						<span><input type="text" class="textbox" id="userOrEmail" name="userOrEmail" value="<?php echo $_smarty_tpl->tpl_vars['userOrEmail']->value;?>
"><img id="xbtn" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/images/x_button.png" /></span>
					</div>
					<div>
						<span><label>密码</label><label id="error-pass"></label></span>
						<span><input type="password" class="password" id="password" name="password"></span>
					</div>
					<div>
						<span><label>验证码</label><label class="error-verify"></label></span>
						<span><input type="text" class="password" name="verify"></span>
						<span><img src="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verify?rd=<?php echo $_smarty_tpl->tpl_vars['rd']->value;?>
" onclick="javascript:this.src+='&rand='+Math.random()" alt="验证码" /><a href="javascript:void(0);" onclick="javascript:this.previousSibling.src+='&rand='+Math.random()">看不清？换一张</a></span>
					</div>
					<div class="sign">
						<div class="submit">
							<input type="submit" id="login" name="login" value="登录" >
						</div>
						<div class="another">
							<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/register">注册新账号</a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/forget">忘记密码?</a>
						</div>
					</div>
					<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
				</form>
			</div>
		</div>
	</div>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['MIN']->value;?>
/?b=<?php echo $_smarty_tpl->tpl_vars['MIN_PUBLIC']->value;?>
/js&f=event.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

/////用户名/邮箱输入框的动作/////////
var xbtn = document.getElementById('xbtn');
var userOrEmail = document.getElementById('userOrEmail');

Event.add(xbtn,'click',function(event) {
	userOrEmail.value = '';
	Event.getTarget(event).style.visibility = 'hidden';
});

Event.add(userOrEmail,'focus',function(event){
	xbtn.style.visibility = 'visible';
	
});

Event.add(userOrEmail,'blur',function(event){
	if (Event.getTarget(event).value == '') {
		xbtn.style.visibility = 'hidden';
	}
});

<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
