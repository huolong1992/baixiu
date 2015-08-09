<?php

/**
 *引进指定分组的控制器/模型类文件
 *
 *@param $class 类名
 *@param $group 分组
 *@param $flag 区分model/controller
 *@return true/false
 */
function loadGroupFile($class, $group, $flag){
	///////按条件加载不同分组里的控制器////////
	switch ($group) {
		case BLOG_GROUP:///blog分组
			$fileName = BLOG_GROUP_PATH. '/' . $flag . '/' . $class . '.class.php';
			break;

		case EMPLOY_GROUP:///employ分组
			$fileName = EMPLOY_GROUP_PATH. '/' . $flag . '/' . $class . '.class.php';
			break;

		case BG_GROUP:///admin分组
			$fileName = BG_GROUP_PATH. '/' . $flag . '/' . $class . '.class.php';
			break;
		
		default:
			return false;
			break;
	}

	/////////引进类文件/////////////
	if (file_exists($fileName)) {
		if (!class_exists($class)) {
			include_once($fileName);
		}

		return true;
	}

	return false;

}


/**
 *引入lib目录下的类文件库
 *
 *@param $class 类名
 */
function import($class){
	$class = ucfirst(strtolower($class));
	$file = LIB_PATH . '/' . $class . '.class.php';
	if (file_exists($file)) {
		if (!class_exists($class)) {
			include($file);
		}
		
	}

}


/**
 *获取指定分组下的配置信息
 *
 *@param $group string 分组名
 *@return $config array 配置信息数组
 */
function getConfig($group){

	/////////获得分组路径////////
	switch ($group) {
		
		case EMPLOY_GROUP:
			$groupPath = EMPLOY_GROUP_PATH;
			break;

		case BG_GROUP:
			$groupPath = BG_GROUP_PATH;
			break;

		case BLOG_GROUP:
		default :
			$groupPath = BLOG_GROUP_PATH;
			break;
	}

	///这里如果用include_once则第二次引用的时候返回空了
	return include($groupPath . '/conf/conf.php');
}


/**
 *设置分页栏信息
 *
 *@param $page 当前页
 *@param $totalPage 总共页数
 *@param $pagenum 分页栏最多显示多少页
 *@param $pages 一维数组 分页栏信息
 */
function getPages($page, $totalPage, $pagenum){

	///////////分为当前页大于总共页数和小于1的情况/////////////
	if ($page > $totalPage) {
		$page = $totalPage;
	}elseif($page < 1){
		$page = 1;
	}

	/////////计算开始页////////////////
	$offset = $page % $pagenum;
	switch ($offset) {
		case 0:
			$start = $page - $pagenum + 1;
			break;

		case 1:
			$start = $page;
			break;
		
		default:
			$start = $page - $offset + 1;
			break;
	}

	/////////设置分页栏//////////////
	for($i=$start,$count=0; ; $i++,$count++){
		if ($i>$totalPage || $count>=$pagenum) break;
		$pages[] = $i;
	}

	return $pages;
}


/**
 *对表单数据进行安全过滤
 *
 *@param $form 二维数组,每个一维数组包含数据项及其类型
 */
function filterForm($form){

	$formArray = array();
	foreach ($form as $value) {

		$data = $value[0];
		$type = $value[1];

		/////////没有get或者post///////////
		if (isset($_GET[$data]) || !empty($_GET[$data]) ) {
			$info = trim($_GET[$data]);

		}elseif(isset($_POST[$data]) || !empty($_POST[$data])) {
				$info = trim($_POST[$data]);
		}else{
			return false;
		}

		/////////数据项是否符合其指定类型////////////
		switch ($type) {
			case 'int':
				if (!is_numeric($info)) {
					return false;
				}
				break;

			case 'string':
				if (!is_string($info)) {
					return false;
				}
				break;
			
			default:
				return false;
				break;
		}


		/////////判断数据项的长度///////////
		if (sizeof($value) == 3) {
			$arr = explode('-', $value[2]);
			switch (sizeof($arr)) {
				case 1:
					if (strlen($info) != $arr[0]) {
						return false;
					}
					break;
				
				default:
					if (strlen($info)<intval($arr[0]) || strlen($info)>intval($arr[1])) {
						return false;
					}
					break;
			}
		}

		$formArray[$data] = htmlspecialchars($info);

	}

	return $formArray;
}


/**
 *对上传的文件进行安全过滤
 *
 *@param $file 二维数组 要过滤的文件名以及类型，大小等限制
 *@return true/false
 */
function filterFile($file){

	foreach ($file as $value) {

		$name = $value[0];//文件名
		$type = $value[1];//文件类型
		$maxSize = $value[2];//最大文件大小

		/////////没有上传文件/////////////
		if (!isset($_FILES[$name]) || !is_uploaded_file($_FILES[$name]['tmp_name'])) {
			return false;
		}

		/////////判断文件的类型///////////
		$arr = explode(',', $type);
		if (array_search($_FILES[$name]['type'], $arr) === false) {
			return false;
		}

		///////判断文件的最大大小
		if ($_FILES[$name]['size'] > $maxSize) {
			return false;
		}

	}

	return true;
}


/**
 *跳转到另一页面函数
 *
 *@author：王永强<1442022614@qq.com>
 *
 *@param $path 要跳转到的页面
 */
function jump($path){
	echo "<script type='text/javascript'>window.location='".$path."'</script>";
}


/**
 *错误提示信息函数
 *
 *@author：王永强<1442022614@qq.com>
 *
 *@param $info 提示错误的信息
 */
function error($info){ 
	echo "<script type='text/javascript'>alert('".$info."');</script>";
}


/**
 *格式化数组
 *
 *@param $array 要格式化的数组
 */
function p($array){
	echo "<pre>";
	echo print_r($array);
	echo "</pre>";
}

?>