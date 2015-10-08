<?php
/**
 *Index控制器
 *
 *@author 王永强<1442022614@qq.com>
 */
class IndexController extends Controller{

	/**
	 *默认动作,获得主页信息
	 */
	public function index(){
		@session_start();

		///////取得page///////////
		if (isset($_GET['page']) && !empty($_GET['page'])) {
			$page = is_numeric($_GET['page']) ? $_GET['page'] : 1;
		}else{
			$page = 1;
		}


		/////////获得分页栏////////////////
		$model = $this->M('Index');
		$rowCount = $model->getRowCount('blog_category');
		$config = getConfig();
		$pagecount = intval($config['pagecount']);//注意int转换
		$totalPage = ceil($rowCount / $pagecount);
		$pagenum = intval($config['pagenum']);//注意int转换
		$pages = getPages($page, $totalPage, $pagenum);


		//////获得博文列表//////////
		$listOrderByTime = $model->getList(($page-1)*$pagecount, $pagecount, 'time desc');
		$clickcount = intval($config['clickcount']);
		$listOrderByClick = $model->getList(0, $clickcount,'click desc');


		//////获取用户信息/////////
		$model = $this->M('User');
		//
		//多用户功能已经测试完毕
		//此处我去掉多用户功能
		//改为只有我一个用户
		//真正展示一个自己的博客
		/*if(!isset($_SESSION['id'])){
			header('Location:'.$this->strGroupUrl.'/user/login');
			die;
		}*/
		$userInfo = $model->getInfoById(13);
		if (!empty($error = $model->getError())) {
			p($error);
			die;
		}

		
		//////赋值并显示模板////////
		$this->assign('list1', $listOrderByTime);//右侧栏博文
		$this->assign('list2', $listOrderByClick);//阅读排行
		$this->assign('current', $page);//当前页
		$this->assign('total', $totalPage);//尾页
		$this->assign('pages', $pages);//分页栏

		$this->assign('username', $userInfo['username']);
		$this->assign('face', $userInfo['face']);
		$this->assign('email', $userInfo['email']);
		$this->assign('phone', $userInfo['phone']);
		$this->assign('count', $userInfo['count']);

		$this->display();
	}



	/**
	 *获取博文详细信息
	 */
	public function detail(){

		///////取得cid///////////
		if (isset($_GET['cid']) && !empty($_GET['cid'])) {
			$cid = is_numeric($_GET['cid']) ? $_GET['cid'] : 1;
		}else{
			$cid = 1;
		}

		///取得type，ajax表示ajax请求，其他表示普通请求///////////
		if (isset($_GET['type']) && !empty($_GET['type'])) {
			$type = $_GET['type'];
		}else{
			$type = 1;
		}

		$model = $this->M('Index');
		//////////请求分为ajax和直接响应//////////
		if ($type == 'ajax') {
			//////根据cid获取文章内容/////////
			$detail = $model->getDetail($cid);
			header('Content-Type:text/html;charset=utf-8');
			if (empty($detail)) {
				echo '暂无该文章内容';
			}else{
				//阅读次数加1
				$model->addClick($cid);
				echo $detail;
			}
			
		}else{

			//获取左侧栏【阅读排行】
			$config = getConfig();
			$clickcount = intval($config['clickcount']);
			$listOrderByClick = $model->getList(0, $clickcount,'click desc');
			$this->assign('list2', $listOrderByClick);

			//////根据cid获取文章内容/////////
			$data= $model->getDetailWithCategory($cid);
			if (empty($data)) {
				$this->assign('title', '无标题');
				$this->assign('time', time());
				$this->assign('click', 0);
				$this->assign('reply', 0);
				$this->assign('content', '暂无该文章内容');
			}else{
				$this->assign('title', $data['title']);
				$this->assign('time', $data['time']);
				$this->assign('click', $data['click']);
				$this->assign('reply',$data['reply']);
				$this->assign('content',$data['content']);

				//阅读次数加1
				$model->addClick($cid);
			}

			/////////获取该文章的评论////////////
			$reply = $model->getReply($cid);
			$this->assign('reply', $reply);

			/////////获取用户信息
			$model = $this->M('User');
			$userInfo = $model->getInfoById(13);
			if (!empty($error = $model->getError())) {
				p($error);
				die;
			}
			$this->assign('username', $userInfo['username']);
			$this->assign('face', $userInfo['face']);
			$this->assign('email', $userInfo['email']);
			$this->assign('phone', $userInfo['phone']);
			$this->assign('count', $userInfo['count']);

			$this->display();

		}

	}


}

?>