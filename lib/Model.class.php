<?php
/**
 *主模型
 *
 *@author 王永强<1442022614@qq.com>
 */
class Model{

	//数据库连接句柄
	protected static $db = null;

	//出错原因
	protected $error = array();

	//各分组的配置文件
	protected $config = array();


	/**
	 *构造函数
	 *
	 *完成数据库的链接
	 */
	public function __construct(){

		//打开数据库
		$dns = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
		try {
			if (!isset(self::$db)) {
				//实例化PDO
				self::$db = new PDO($dns, DB_USER, DB_PASS);

				//开启异常处理模式
				self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//设置字符集
				self::$db->query('set names ' . DB_CHARSET);
			}

		} catch (PDOException $e) {
			die('无法打开数据库');
		}

	}




	/**
	 *返回错误原因
	 *
	 *@return 一维数组
	 */
	public function getError(){
		return $this->error;
	}



	/**
	 *获取指定分组下的配置文件
	 *
	 *@param $group string 分组名称
	 *@return 一维数组
	 */
	public function getConfig($group){
		$this->config[$group] = getConfig($group);
		return $this->config[$group];
	}

}

?>