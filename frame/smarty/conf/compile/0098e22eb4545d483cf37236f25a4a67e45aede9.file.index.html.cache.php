<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-18 22:03:57
         compiled from "/var/www/baixiu/blog/view/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:61674753855e43f9ccfc7d5-40337365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0098e22eb4545d483cf37236f25a4a67e45aede9' => 
    array (
      0 => '/var/www/baixiu/blog/view/index/index.html',
      1 => 1441022299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61674753855e43f9ccfc7d5-40337365',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e43f9d35b6a9_04045596',
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
    'list1' => 0,
    'ACTION' => 0,
    'current' => 0,
    'pages' => 0,
    'total' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e43f9d35b6a9_04045596')) {function content_55e43f9d35b6a9_04045596($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/baixiu/frame/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/baixiu/frame/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('PUBLIC'=>$_smarty_tpl->tpl_vars['PUBLIC']->value,'CONTROLLER'=>$_smarty_tpl->tpl_vars['CONTROLLER']->value,'title'=>'百秀自己'), 0);?>

    
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
                    <li><a href="/"><img src="" /></a></li>
                    <li><a href="/"><img src="" /></a></li>
                    <li><a href="/"><img src="" /></a></li>
                    <li><a href="/"><img src="" /></a></li>
                    <li><a href="/"><img src="" /></a></li>
                    <li><a href="/"><img src="" /></a></li>
                </ul>
                <a href="" class="more">查看更多</a>
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
            <a href="#"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</a>
            <span>时间(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['time'],"Y-m-d");?>
))&nbsp;&nbsp;阅读(<?php echo $_smarty_tpl->tpl_vars['value']->value['click'];?>
)</span>
        </h2>
        <ul id="dd" class="text"><?php echo $_smarty_tpl->tpl_vars['value']->value['introduction'];?>
</ul><div class="textfoot" id="detail"><a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/detail?cid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" onclick="javascript:getDetail(this);return false;">阅读全文</a><a href="<?php echo $_smarty_tpl->tpl_vars['CONTROLLER']->value;?>
/reply?cid=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">评论(<?php echo $_smarty_tpl->tpl_vars['value']->value['reply'];?>
)</a></div>
    </article>
    <?php } ?>
    <div class="pages">
        <a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=1">首页</a>
        <?php if ($_smarty_tpl->tpl_vars['current']->value>1) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['current']->value-1;?>
">上一页</a>
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
">下一页</a>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['ACTION']->value;?>
?page=<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
">尾页</a>
    </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/js/ajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

function getDetail(tag){
    var url = tag.href + '&type=ajax';
    var options = {
        onsuccess:function(data){
            tag.parentNode.previousSibling.innerHTML = data;
        },
        onerror:function(data){
            tag.parentNode.previousSibling.innerHTML = 'no data';
        }
    }
    Ajax.send(url,options);
}


<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
