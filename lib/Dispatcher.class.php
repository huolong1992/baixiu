<?php
/**
 *URL地址解析类
 *
 *@author：王永强<1442022614@qq.com>
 */

class Dispatcher {

	//URL解析
	public static function start(){

		////////////引入必要文件////////////
		self::loadFile();
		
		//自动加载类
		//self::loadClass();

		//解析URL地址
		self::parseUrl();

		//设置控制器
		self::setController();
	}


	/**
	 *引入必要文件
	 */
	private static function loadFile(){

		//公共数据库配置
		include_once(CONF_PATH . '/db.php');

		//分组,控制器,动作配置
		include_once(CONF_PATH . '/gca.php');

		//公共函数
		include_once(COMMON_PATH . '/function.php');

		//smarty模板
		include_once(FRAME_PATH . '/smarty/Smarty.class.php');

		//////lib类库函数////////
		include_once(LIB_PATH . '/Controller.class.php');
		include_once(LIB_PATH . '/Model.class.php');

	}


	/**
	 *自动加载类
	 *
	 */
	/*private static function loadClass(){
		
		//自动加载lib目录里的类
		spl_autoload_register(array('Dispatcher', 'loadLib'));

		//自动加载模板frame里的类
		//spl_autoload_register(array('Dispatcher', 'loadFrame'));

		//自动加载模型Model里的类
		spl_autoload_register(array('Dispatcher', 'loadModel'));

		//自动加载控制器Controller里的类(放在最后注册)
		spl_autoload_register(array('Dispatcher', 'loadController'));

	}*/


	/**
	 *自动加载lib目录里的类
	 *
	 */
	/*private static function loadLib($class){
		
		$fileName = LIB_PATH . '/' . $class . '.class.php';

		//引入相应类文件
		self::includeFile($class, $fileName);

	}*/


	/**
	 *自动加载控制器Controller里的类
	 *
	 */
	/*private static function loadController($class){

		///////按条件加载不同分组里的控制器////////
		switch (GROUP) {
			case INDEX_GROUP:///index分组
				$fileName = INDEX_GROUP_PATH. '/controller/' . $class . '.class.php';
				break;

			case EMPLOY_GROUP:///employ分组
				$fileName = EMPLOY_GROUP_PATH. '/controller/' . $class . '.class.php';
				break;

			case BG_GROUP:///admin分组
				$fileName = BG_GROUP_PATH. '/controller/' . $class . '.class.php';
				break;
			
			default:
				return false;
				break;
		}

		
		//引入相应类文件
		//self::includeFile($class, $fileName);

	}*/


	/**
	 *自动加载模型Model里的类
	 *
	 */
	/*private static function loadModel($class){

		///////按条件加载不同分组里的模型////////
		switch (GROUP) {
			case INDEX_GROUP:///index分组
				$fileName = INDEX_GROUP_PATH. '/model/' . $class . '.class.php';
				break;

			case EMPLOY_GROUP:///employ分组
				$fileName = EMPLOY_GROUP_PATH. '/model/' . $class . '.class.php';
				break;

			case BG_GROUP:///admin分组
				$fileName = BG_GROUP_PATH. '/model/' . $class . '.class.php';
				break;
			
			default:
				return false;
				break;
		}

		//引入相应类文件
		self::includeFile($class, $fileName);
		

	}*/


	/**
	 *自动加载模板frame里的类
	 *
	 */
	/*private static function loadFrame($class){

		$fileName = FRAME_PATH . '/smarty/' . $class . '.class.php';
		
		//引入相应类文件
		self::includeFile($class, $fileName);

	}*/


	/**
	 *引入相应类文件
	 *
	 */
	/*private static function includeFile($class, $fileName){
		
		if(file_exists($fileName)){///存在该文件
			//////还没有加载该类//////
			if (!class_exists($class)) {
				include_once($fileName);
			}
		}else{
			$controller = new Controller(DEFAULT_GROUP, COMMON_CONTROLLER, COMMON_ERROR_PAGE);
			$controller->errorPage();
			die;
		}

	}*/


	/**
	 *解析URL地址
	 *
	 */
	private static function parseUrl(){

		//////判断path_info是否空////
		if (isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])) {

			$arr = explode('/', $_SERVER['PATH_INFO']);

			////根据path_info的个数分配/////
			switch (count($arr)) {
			case 2:///localhost/index.php/
				////分配默认分组,控制器,动作////
				define('GROUP', DEFAULT_GROUP);
				define('CONTROLLER', DEFAULT_CONTROLLER);
				define('ACTION', DEFAULT_ACTION);
				break;

			case 3:
				//////分配分组,控制器,动作/////
				if (empty($arr[2])) {///localhost/index.php/index/
					define('GROUP', $arr[1]);
					define('CONTROLLER', DEFAULT_CONTROLLER);
					define('ACTION', DEFAULT_ACTION);
				}else{///localhost/index.php/index/index
					define('GROUP', $arr[1]);
					define('CONTROLLER', $arr[2]);
					define('ACTION', DEFAULT_ACTION);
				}
				break;

			case 4:
				/////分配分组,控制器,动作/////
				if (empty($arr[3])) {///localhost/index.php/index/index/
					define('GROUP', $arr[1]);
					define('CONTROLLER', $arr[2]);
					define('ACTION', DEFAULT_ACTION);
				}else{///localhost/index.php/index/index/index
					define('GROUP', $arr[1]);
					define('CONTROLLER', $arr[2]);
					define('ACTION', $arr[3]);
				}
				
				break;
			
			default:///localhost/index.php/index/index/index/abc
				define('GROUP', $arr[1]);
				define('CONTROLLER', $arr[2]);
				define('ACTION', $arr[3]);
				break;
			}
			
		}else{///localhost/index.php

			/////分配默认分组,控制器,动作////
			define('GROUP', DEFAULT_GROUP);
			define('CONTROLLER', DEFAULT_CONTROLLER);
			define('ACTION', DEFAULT_ACTION);
			
		}

	}


	/**
	 *设置控制器,并执行相应动作
	 *
	 */
	private static function setController(){
		
		//////创建相应控制器////
		$controller =  ucfirst(strtolower(CONTROLLER)) . 'Controller';
		if (!loadGroupFile($controller,strtolower(GROUP),'controller')){
			///类文件不存在
			$controller = new Controller(DEFAULT_GROUP, COMMON_CONTROLLER, COMMON_ERROR_PAGE);
			$controller->errorPage();
			die;
		}
		$controller = new $controller(GROUP, CONTROLLER, ACTION);

		//////////执行相应动作///////
		$controller->runAction();
		

	}


	
}

?>