<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-07-21 20:39:45
         compiled from "/var/www/baixiu/index/view/index/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:55385076955acea32794f04-16080562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '041fb1dbe337b09db89e55c0838dc5f33c5c24b6' => 
    array (
      0 => '/var/www/baixiu/index/view/index/detail.html',
      1 => 1437482383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55385076955acea32794f04-16080562',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55acea32a34333_35675062',
  'variables' => 
  array (
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
    'list2' => 0,
    'value' => 0,
    'title' => 0,
    'time' => 0,
    'click' => 0,
    'content' => 0,
    'reply' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55acea32a34333_35675062')) {function content_55acea32a34333_35675062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/baixiu/frame/smarty/plugins/modifier.truncate.php';
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
                <li><a href="#"  target="_blank">关于我们</a></li>
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
            <article>
                <h2 class="title">
                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
                    <span>时间(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"Y-m-d");?>
))&nbsp;&nbsp;阅读(<?php echo $_smarty_tpl->tpl_vars['click']->value;?>
)</span>
                </h2>
                <ul class="text">
                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                </ul>
            </article>
            <article>
                <h2 class="title">
                    评论
                </h2>
                <ul class="text">
                    <?php if (empty($_smarty_tpl->tpl_vars['reply']->value)) {?>
                        暂无评论
                    <?php } else { ?>
                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reply']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['time'],"Y-m-d");?>
</li>
                        <?php } ?>
                    <?php }?>
                </ul>
            </article>
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

</body>
</html><?php }} ?>
