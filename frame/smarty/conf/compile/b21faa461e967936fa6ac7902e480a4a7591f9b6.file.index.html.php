<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-21 20:39:50
         compiled from "/var/www/baixiu/index/view/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:156533390955a1124854d2a0-84299989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b21faa461e967936fa6ac7902e480a4a7591f9b6' => 
    array (
      0 => '/var/www/baixiu/index/view/index/index.html',
      1 => 1437482376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156533390955a1124854d2a0-84299989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55a112486485d6_41501344',
  'variables' => 
  array (
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
    'list2' => 0,
    'value' => 0,
    'list1' => 0,
    'ACTION' => 0,
    'current' => 0,
    'pages' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a112486485d6_41501344')) {function content_55a112486485d6_41501344($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/baixiu/frame/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/baixiu/frame/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>百秀自己</title>
    <link href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav id="nav">
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
">网站首页</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
">我的博客</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#" target="_blank">我们的故事</a></li>
                <li><a href="#" target="_blank">我们的蜜月</a></li>
                <li><a href="#" target="_blank">婚礼现场</a></li>
                <li><a href="#" target="_blank">婚纱摄影</a></li>
                <li><a href="#" target="_blank">我们的博客</a></li>       
                <li><a href="#" target="_blank">联系我们</a></li>
                </ul>
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/js/silder.js"><?php echo '</script'; ?>
><!--获取当前页导航 高亮显示标题-->
        </nav>
    </header>
    
    <div class="mainContent">
        <aside>
            <div class="avatar">
                <a href="#"><span>青轻飞扬</span></a>
            </div>
            <section class="topspaceinfo">
                <h1>执子之手，与子偕老</h1>
                <p>于千万人之中，我遇见了我所遇见的人....</p>
            </section>
            <div class="userinfo"> 
                <p class="q-fans"> 粉丝：<a href="/" target="_blank">167</a></p> 
                <p class="btns"><a href="/" target="_blank" >私信</a><a href="/" target="_blank">相册</a><a href="/" target="_blank">存档</a></p>   
            </div>
            <section class="most">
                <h2>阅读排行</h2>
                <ul>
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                    <li>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/detail?cid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['title'],20);?>
<span>(<?php echo $_smarty_tpl->tpl_vars['value']->value['click'];?>
次)</span></a>
                    </li>
                <?php } ?>
                </ul>
            </section>
            <section class="taglist">
                <h2>全部标签</h2>
                <ul>
                    <li><a href="/">青空</a></li>
                    <li><a href="/">情感聊吧</a></li>
                    <li><a href="/">study</a></li>
                    <li><a href="/">青青唠叨</a></li>
                </ul>
            </section>
        </aside>
        <div class="blogitem">
        	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
            	<article>
		<h2 class="title">
			<a href=""><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</a>
			<span>时间(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['time'],"Y-m-d");?>
))&nbsp;&nbsp;阅读(<?php echo $_smarty_tpl->tpl_vars['value']->value['click'];?>
)</span>
		</h2>
		<ul class="text">
			<?php echo $_smarty_tpl->tpl_vars['value']->value['introduction'];?>

		</ul>
		<div class="textfoot" id="detail">
			<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/detail?cid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">阅读全文</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/reply?cid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">评论(<?php echo $_smarty_tpl->tpl_vars['value']->value['reply'];?>
)</a>
		</div>
	</article>
	<?php } ?>
	<div class="pages">
		<a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=1">首页</a>
		<?php if ($_smarty_tpl->tpl_vars['current']->value>1) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['current']->value-1;?>
">&lt;&lt;上一页</a>
		<?php }?>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['current']->value) {?>
				<span><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</span>
			<?php } else { ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</a>
			<?php }?>
		<?php } ?>
		<?php if ($_smarty_tpl->tpl_vars['current']->value<$_smarty_tpl->tpl_vars['total']->value) {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['current']->value+1;?>
">下一页&gt;&gt;</a>
		<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
">尾页</a>
	</div>
        </div>
    </div>

    <footer>
        <div class="footavatar">
            <img src="images/photo.jpg" class="footphoto">
            <ul class="footinfo">
                <p class="fname"><a href="/dancesmile" >青轻飞扬</a>  </p>
                <p class="finfo">性别：女 年龄：25岁</p>
                <p>现居：四川成都</p>
            </ul>
        </div>
        <section class="visitor">
            <h2>最近访客</h2>
            <ul>
                <li><a href="/"><img src="images/s0.jpg"></a></li>
                <li><a href="/"><img src="images/s1.jpg"></a></li>
                <li><a href="/"><img src="images/s2.jpg"></a></li>
                <li><a href="/"><img src="images/s3.jpg"></a></li>
                <li><a href="/"><img src="images/s5.jpg"></a></li>
                <li><a href="/"><img src="images/s6.jpg"></a></li>
                <li><a href="/"><img src="images/s7.jpg"></a></li>
                <li><a href="/"><img src="images/s8.jpg"></a></li>
            </ul>
        </section>
        <div class="Copyright">
            <ul>
                <a href="/">帮助中心</a>
                <a href="/">空间客服</a>
                <a href="/">投诉中心</a>
                <a href="/">空间协议</a>
            </ul>
            <p>Design by DanceSmile</p>
        </div>
    </footer>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function(){
	
	///////////点击阅读全文//////////////////
	$('#detail a').click(function(event){
		event.preventDefault();
		var a = $(this);///不能写成var this=$(this);
		var url = a.attr('href');
		$.ajax({
			url: url,
			data: {'type':'ajax'}
		}).always(function(){
		}).done(function(data) {
			a.parent().prev('ul').empty().append(data);
		}).fail(function() {
			return ;
		});
	});
});
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
