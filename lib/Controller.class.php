<?php
/**
 *主控制器
 *
 *@author 王永强<1442022614@qq.com>
 */
class Controller{

	//smarty实例
	protected $objSmarty = null;

	//分组
	protected $strGroup;

	//控制器
	protected $strController;

	//动作
	protected $strAction;

	//分组的URL
	protected $strGroupUrl;

	//控制器的URL
	protected $strControllerUrl;

	//动作的URL
	protected $strActionUrl;


	/**
	 *构造函数
	 *
	 *@param $strGroup 分组
	 *@param $strController 控制器
	 *@param $strAction 动作
	 */
	public function __construct($strGroup, $strController, $strAction){

		$this->strGroup = $strGroup;
		$this->strController = $strController;
		$this->strAction = $strAction;

		$this->strGroupUrl = DOMAIN.'/'.$this->strGroup;
		$this->strControllerUrl = DOMAIN.'/'.$this->strGroup.'/'.$this->strController;
		//$this->strActionUrl = DOMAIN.'/'.$this->strGroup.'/'.$this->strController.'/'.$this->strAction;
	}


	/**
	 *出错页面
	 */
	public function errorPage(){
		$this->assign('reason', '页面不存在');
		$this->display();
	}


	/**
	 *执行相应动作
	 */
	public function runAction(){
		//////调用的动作不存在//////////
		$action = strtolower($this->strAction);
		if (!method_exists($this, $action)) {
			$controller = new Controller(DEFAULT_GROUP, COMMON_CONTROLLER, COMMON_ERROR_PAGE);
			$controller->errorPage();
			die;
		}

		$this->$action();
	}


	/**
	 *视图模板赋值
	 *
	 *@param $strName 变量名
	 *@param $strValue 变量值
	 */
	protected function assign($strName, $strValue){

		//实例化smarty
		if (!isset($this->objSmarty)) {
			$this->initSmarty();
		}

		$this->objSmarty->assign($strName, $strValue);
	}


	/**
	 *显示相应视图
	 *
	 *@param $strAction 视图页面(动作)名称
	 */
	protected function display($strAction=null){

		////////实例化smarty//////
		if (!isset($this->objSmarty)) {
			$this->initSmarty();
		}

		//////是否指定了动作//////
		if (isset($strAction) && !empty($strAction)) {
			$this->objSmarty->display(strtolower($strAction) . '.html');
		}else{
			$this->objSmarty->display(strtolower($this->strAction) . '.html');
		}

		
	}


	/**
	 *实例化用户模型
	 *
	 *@param $model string 要实例化的模型
	 *@return $model 实例化后的模型对象
	 */
	protected function M($model=null){

		//////////创建相应模型////////////
		$model = ucfirst(strtolower($model)) . 'Model';
		if (!loadGroupFile($model,strtolower($this->strGroup),'model')) {
			///类文件不存在
			$controller = new Controller(DEFAULT_GROUP, COMMON_CONTROLLER, COMMON_ERROR_PAGE);
			$controller->errorPage();
			die;
		}

		return new $model();
	}


	/**
	 *实例化smarty
	 */
	private function initSmarty(){

		$this->objSmarty = new Smarty();

		//目录变量
		$this->objSmarty->config_dir = FRAME_PATH . '/smarty/conf/config/';

		////////模板目录/////////
		switch ($this->strGroup) {
		
			case EMPLOY_GROUP:
				$groupPath = EMPLOY_GROUP_PATH;
				break;

			case BG_GROUP:
				$groupPath = BG_GROUP_PATH;
				break;
			//case INDEX_GROUP:
			default :
				$groupPath = BLOG_GROUP_PATH;
				break;
		}
		$this->objSmarty->template_dir = $groupPath . '/view/' . strtolower($this->strController) . '/';

		//编译目录
		$this->objSmarty->compile_dir = FRAME_PATH . '/smarty/conf/compile/';

		//缓存目录
		$this->objSmarty->cache_dir = FRAME_PATH . '/smarty/conf/cache/';

		//插件目录（除非用自己的插件，否则千万不要设置）
		//$this->objSmarty->plugins_dir = FRAME_PATH . '/smarty/conf/plugins/';

		//左右边界符,默认为{},但实际应用当中容易与JavaScript相冲突
		$this->objSmarty->left_delimiter = '{*';
		$this->objSmarty->right_delimiter = '*}';

		//是否使用缓存，项目在调试期间，不建议启用缓存
		$this->objSmarty->caching = false; 

		//关闭调试
		$this->objSmarty->debugging = false; 

		////////定义当前分组,控制器,动作路由,用于界面/////////
		$this->objSmarty->assign('GROUP', $this->strGroupUrl);
		$this->objSmarty->assign('CONTROLLER', $this->strControllerUrl);
		$this->objSmarty->assign('ACTION', $this->strActionUrl);

		//定义公有公开文件路由
		$this->objSmarty->assign('COMMON_PUBLIC', DOMAIN.'/public');

		//定义当前分组公开文件路由
		$this->objSmarty->assign('PUBLIC', $this->strGroupUrl.'/public');

		//模板页眉
		$this->objSmarty->assign('header','file:'.$groupPath . '/view/'.COMMON_CONTROLLER.'/header.html');

		//模板页脚
		$this->objSmarty->assign('footer','file:'.$groupPath . '/view/'.COMMON_CONTROLLER.'/footer.html');
	}

}

?>