<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-25 19:02:05
         compiled from "/var/www/baixiu/index/view/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:73089223955b0c58f75a211-49806091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abde821612deaf04f58966a5ffda27c0d0d5297a' => 
    array (
      0 => '/var/www/baixiu/index/view/user/register.html',
      1 => 1437822111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73089223955b0c58f75a211-49806091',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55b0c58f90ac61_58683831',
  'variables' => 
  array (
    'CONTROLLER' => 0,
    'rd' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b0c58f90ac61_58683831')) {function content_55b0c58f90ac61_58683831($_smarty_tpl) {?><!DOCTYPE html>
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
/registerAction" method="post">
				         	<div>
						<span><label>用户名</label></span>
						<span><input type="text" class="textbox" id="username" name="username"></span>长度在6~30个字符
					</div>
					<div>
						<span><label>邮箱</label></span>
						<span><input type="text" class="textbox" id="email" name="email"></span>长度在5~50个字符
					</div>
					<div>
						<span><label>密码</label></span>
						<span><input type="password" class="password" id="password" name="password"></span>长度在6~20个字符
					</div>
					<div>
						<span><label>验证码</label></span>
						<span><input type="text" class="password" name="verify"><img src="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verify?rd=<?php echo $_smarty_tpl->tpl_vars['rd']->value;?>
" onclick="javascript:this.src+='&rand='+Math.random()"></span>
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
