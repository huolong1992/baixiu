<?php
/**
 *Common控制器,一些公共操作
 *
 *@author 王永强<1442022614@qq.com>
 */
class CommonController extends Controller{

	/**
	 *页面不存在动作
	 */
	public function pageNotExist(){

		$this->assign('reason', '您访问的页面不存在 !');
		$this->display('index');
	}
}

?>