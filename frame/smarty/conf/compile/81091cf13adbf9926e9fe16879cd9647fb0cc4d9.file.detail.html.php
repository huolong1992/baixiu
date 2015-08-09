<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-09 19:09:17
         compiled from "/var/www/baixiu/blog/view/index/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:149317051155c4b54da6c8a9-91471064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81091cf13adbf9926e9fe16879cd9647fb0cc4d9' => 
    array (
      0 => '/var/www/baixiu/blog/view/index/detail.html',
      1 => 1439118356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149317051155c4b54da6c8a9-91471064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55c4b54dcd5ef9_23105398',
  'variables' => 
  array (
    'header' => 0,
    'PUBLIC' => 0,
    'CONTROLLER' => 0,
    'face' => 0,
    'username' => 0,
    'count' => 0,
    'list2' => 0,
    'value' => 0,
    'title' => 0,
    'time' => 0,
    'click' => 0,
    'content' => 0,
    'reply' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c4b54dcd5ef9_23105398')) {function content_55c4b54dcd5ef9_23105398($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/baixiu/frame/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/baixiu/frame/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('PUBLIC'=>$_smarty_tpl->tpl_vars['PUBLIC']->value,'CONTROLLER'=>$_smarty_tpl->tpl_vars['CONTROLLER']->value,'title'=>'百秀自己'), 0);?>

    
    <div class="mainContent">
        <aside>
            <div class="avatar">
                <img src="<?php echo $_smarty_tpl->tpl_vars['face']->value;?>
"/>
            </div>
            <section class="topspaceinfo">
                <span><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</span><a href=""></a>
                <p>暂无个性签名</p>
            </section>
            <div class="userinfo">
                <p class="q-fans"> 文章：<a href="/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</a></p>
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
                <h2>最近访客</h2>
                <ul>
                    <li><a href="/"><img src="gd.png" /></a></li>
                    <li><a href="/"><img src="gd.png" /></a></li>
                    <li><a href="/"><img src="gd.png" /></a></li>
                    <li><a href="/"><img src="gd.png" /></a></li>
                    <li><a href="/"><img src="gd.png" /></a></li>
                    <li><a href="/"><img src="gd.png" /></a></li>
                </ul>
                <a href="" class="more">查看更多</a>
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

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body>
</html><?php }} ?>
