<?php
/**
 *路径配置
 */

//项目URL路径
define('DOMAIN', 'http://localhost/baixiu');

//项目绝对根路径
define('PROJECT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/baixiu');

//后台分组admin路径
define('BG_GROUP_PATH', PROJECT_PATH . '/admin');

//前台分组blog路径
define('BLOG_GROUP_PATH', PROJECT_PATH . '/blog');

//前台分组employ路径
define('EMPLOY_GROUP_PATH', PROJECT_PATH . '/employ');

//公共配置文件路径
define('CONF_PATH', PROJECT_PATH . '/conf');

//公共函数文件路径
define('COMMON_PATH', PROJECT_PATH . '/common');

//模板文件路径
define('FRAME_PATH', PROJECT_PATH . '/frame');

//公开样式文件路径
define('PUBLIC_PATH', PROJECT_PATH . '/public');

//核心函数类库路径
define('LIB_PATH', PROJECT_PATH . '/lib');

//上传文件路径
define('FILE_PATH', PROJECT_PATH . '/file');

?>