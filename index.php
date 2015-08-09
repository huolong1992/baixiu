<?php

//引入路径配置文件
include('./conf/path.php');

//引入地址解析类文件,并执行
include(LIB_PATH . '/Dispatcher.class.php');
Dispatcher::start();

?>