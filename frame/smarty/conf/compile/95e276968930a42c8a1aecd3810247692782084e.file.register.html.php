<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-28 10:26:05
         compiled from "/var/www/baixiu/blog/view/user/register.html" */ ?>
<?php /*%%SmartyHeaderCode:73084810155b75ef4aaa630-42641882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95e276968930a42c8a1aecd3810247692782084e' => 
    array (
      0 => '/var/www/baixiu/blog/view/user/register.html',
      1 => 1440728729,
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
    'MIN' => 0,
    'MIN_PUBLIC' => 0,
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
				<form id="form" action="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/registerAction" method="post">
				         	<div>
						<span><label>用户名</label><label id="error-user">长度在6~30个字符</label></span>
						<span><input type="text" class="textbox" id="username" name="username"></span>
					</div>
					<div>
						<span><label>邮箱</label><label id="error-mail">长度在5~50个字符</label></span>
						<span><input type="text" class="textbox" id="email" name="email"></span>
					</div>
					<div>
						<span><label>密码</label><label id="error-pass">长度在6~20个字符</label></span>
						<span><input type="password" class="password" id="password" name="password"></span>
					</div>
					<div>
						<span><label>验证码</label><label id="error-verify"></label></span>
						<span><input type="text" class="password" name="verify" id="verify"></span>
						<span><img src="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verify?rd=<?php echo $_smarty_tpl->tpl_vars['rd']->value;?>
" onclick="javascript:this.src+='&rand='+Math.random()" alt="验证码" id="imgVerify" /><a href="javascript:void(0);" onclick="javascript:this.previousSibling.src+='&rand='+Math.random()">看不清？换一张</a></span>
					</div>
					<div class="sign">
						<div class="submit">
							<input type="button" id="register" name="register" value="注册" >
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
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['MIN']->value;?>
/?b=<?php echo $_smarty_tpl->tpl_vars['MIN_PUBLIC']->value;?>
/js&f=event.js,ajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
/////////////获得各个input框的节点
var username = document.getElementById('username');
var password = document.getElementById('password');
var email = document.getElementById('email');
var verify = document.getElementById('verify');
var form = document.getElementById('form');
var btn = document.getElementById('register');

////////////获得各个input框的错误提示节点
var eUser = document.getElementById('error-user');
var eMail = document.getElementById('error-mail');
var ePass = document.getElementById('error-pass');
var eVerify = document.getElementById('error-verify');

///////////验证码是否正确
/////由于ajax回调函数里不能返回true/false
////所以这里用一个全局变量来标志
var flag = false;

/////////////事件委托方式(适合于同一页面大量的事件绑定)
Event.add(document,'keyup',function(event){
	event = Event.getEvent(event);
	var target = Event.getTarget(event);
	setTimeout(function(){
		//////////根据节点的不同...
		switch(target.id){
			case username.id:
				showError(target,eUser,6,30);
				break;
			case password.id:
				showError(target,ePass,6,20);
				break;
			case email.id:
				showError(target,eMail,5,50);
				break;
			case verify.id:
				verifyCheck();
				break;
		}
		
	},0);
},false);

/*//////////////监听username的onkeyup事件
Event.add(username,'keyup',function(event){
	///加上延迟执行才能达到预期的目的
	///否则只有到输入7个字符时才隐藏错误
	event = Event.getEvent(event);
	var target = Event.getTarget(event);
	setTimeout(function(){
		var user = document.getElementById('error-user');
		showError(target,user,6,30);
	},0);
});

//////////////监听email的onkeyup事件
Event.add(email,'keyup',function(event){
	///加上延迟执行才能达到预期的目的
	///否则只有到输入7个字符时才隐藏错误
	event = Event.getEvent(event);
	var target = Event.getTarget(event);
	setTimeout(function(){
		var user = document.getElementById('error-mail');
		showError(target,user,5,50);
	},0);
});

///////////////注册password的onkeyup事件
Event.add(password,'keyup',function(event){
	///加上延迟执行才能达到预期的目的
	///否则只有到输入7个字符时才隐藏错误
	event = Event.getEvent(event);
	var target = Event.getTarget(event);
	setTimeout(function(){
		var user = document.getElementById('error-pass');
		showError(target,user,6,20);
	},0);
});

//////////////注册verify的onkeyup事件
Event.add(verify,'keyup',function(event){
	verifyCheck();
});*/

//////////////注册form的onsubmit事件
//因为按下enter键提交表单时也会触发keyup事件,
//所以这里要阻止提交表单
Event.add(form,'submit',function(event){
	event = Event.getEvent(event);
	Event.preventDefault(event);
});

////////////注册button的onclick事件
Event.add(btn,'click',function(event){
	event = Event.getEvent(event);
	var target = Event.getTarget(event);
	if(showError(username,eUser,6,30) && showError(email,eMail,5,50) && showError(password,ePass,6,20)){
		verifyCheck();
		if(flag){
			form.submit();
		}
	}else{
		return false;
	}
})

/**
 *验证输入或显示错误
 */
function showError(dest,error,min,max){
	if(dest.value.length<min || dest.value.length>max){
		error.style.visibility = 'visible';
		return false;
	}else{
		error.style.visibility = 'hidden';
		return true;
	}
}

/**
 *验证码验证
 */
function verifyCheck(){
	
	eVerify.style.visibility = 'visible';
	var url = '<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/verifyCheck?verify='+verify.value;
	var options = {
		onsuccess:function(data){
			if(data=='1'){
				eVerify.innerHTML = 'ok';
				flag = true;
			}else{
				eVerify.innerHTML = '验证码不正确';
				flag = false;
			}
			
		},
		onerror:function(data){
			flag = false;
		}
	}
	Ajax.send(url,options);

}
<?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
