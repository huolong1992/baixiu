<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-31 10:53:53
         compiled from "/var/www/baixiu/blog/view/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:73084810155b75ef4aaa630-42641882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95e276968930a42c8a1aecd3810247692782084e' => 
    array (
      0 => '/var/www/baixiu/blog/view/user/register.html',
      1 => 1438309184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73084810155b75ef4aaa630-42641882',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55b75ef4b5bdd0_08537665',
  'variables' => 
  array (
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
    'rd' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b75ef4b5bdd0_08537665')) {function content_55b75ef4b5bdd0_08537665($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/css/login.css" rel='stylesheet' type='text/css' />
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
/registerAction" method="post">
				         	<div>
						<span><label>用户名</label><label class="error">长度在6~30个字符</label></span>
						<span><input type="text" class="textbox" id="username" name="username"></span>
					</div>
					<div>
						<span><label>邮箱</label><label class="error">长度在5~50个字符</label></span>
						<span><input type="text" class="textbox" id="email" name="email"></span>
					</div>
					<div>
						<span><label>密码</label><label class="error">长度在6~20个字符</label></span>
						<span><input type="password" class="password" id="password" name="password"></span>
					</div>
					<div>
						<span><label>验证码</label><label class="error"></label></span>
						<span><input type="text" class="password" name="verify"></span>
						<span><img src="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verify?rd=<?php echo $_smarty_tpl->tpl_vars['rd']->value;?>
" onclick="javascript:this.src+='&rand='+Math.random()" alt="验证码" /><a href="javascript:void(0);" onclick="javascript:this.previousSibling.src+='&rand='+Math.random()">看不清？换一张</a></span>
					</div>
					<div class="sign">
						<div class="submit">
							<input type="submit" id="register" name="register" value="注册" >
							<input type="hidden" name="token" value="<?php echo '<?'; ?>
=$token<?php echo '?>'; ?>
">
						</div>
						<span class="forget-pass">
							<a id="change" href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/login">已注册?点击登录</a>
						</span>
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

		//切换为submit
		$('#change').on('click', function(event){
			event.preventDefault();

			//判断是register还是login
			var id,name,value,text;
			var oldId = $(':submit').attr('id');
			if (oldId == 'register') {
				id = 'login';
				name = 'login';
				value = '登录';
				text = '还没注册?点击注册'
			}else{
				id = 'register';
				name = 'register';
				value = '注册';
				text = '已注册?点击登录';
			}

			//修改submit属性
			
			$('#'+oldId).attr('name', name);
			$('#'+oldId).attr('value', value);
			$('#'+oldId).attr('id', id);

			//修改id=change的值
			$('#change').text(text);
		});
	});
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
