<?php
/**
 *用户中心控制器
 *
 *@author 王永强<1442022614@qq.com>
 */
class UserController extends Controller{

	/**
	 *个人主页
	 */
	public function index(){

		///////////////判断是否已经登录////////////
		//$sessionMysql = new SessionMysql;
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			$model = $this->M('User');
			$userInfo = $model->getInfoById($_SESSION['id']);
			if (!empty($error = $model->getError())) {
				p($error);
				die;
			}
			$this->assign('username', $userInfo['username']);
			$this->assign('face', $userInfo['face']);
			$this->assign('email', $userInfo['email']);
			$this->assign('phone', $userInfo['phone']);
			$this->assign('count', $userInfo['count']);
			$this->display('index');
		}else{
			error('您还没有登录');
			jump($this->strControllerUrl.'/login');
		}

		
	}



	/**
	 *生成并设置验证码
	 */
	public function verify(){
		$sessionMysql = new SessionMysql;
		////////设置验证码//////
		$rand='';
		for ($i=0; $i<4; $i++){
			$rand .= dechex (mt_rand(1, 15));//十六进制1~F
		}
		$_SESSION['verify'] = md5($rand);

		////////生成并输出验证码////////
		import('Image');
		Image::buildImageVerify('png',50,30,$rand);
	}


	/**
	 *ajax验证码验证
	 */
	public function verifyCheck(){
		$sessionMysql = new SessionMysql;
		header('Content-Type:text/html');
		if (!isset($_GET['verify'])) {
			echo '0';
			return ;
		}
		$verify = trim($_GET['verify']);
		if ($_SESSION['verify']!=md5($verify)) {
			echo '0';
			return ;
		}
		echo '1';
	}


	/**
	 *注册后提示用户激活邮箱的界面
	 */
	public function code(){

		////提示用户前去激活邮箱////////
		$url = isset($_GET['url'])?$_GET['url']:'';
		$content = '<a href="'.$url.'" target="blank">您的邮箱已激活，请前往激活您的邮箱</a>';
		$this->assign('content',$content);
		$this->display('code');

	}


	/**
	 *登录界面
	 */
	public function login(){
		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/index');
		}else{
			///////设置令牌/////////
			$_SESSION['token'] = uniqid(mt_rand(), true);

			///////赋值并显示//////////
			$this->assign('userOrEmail',isset($_COOKIE['userOrEmail'])?$_COOKIE['userOrEmail']:'');
			$this->assign('rd',mt_rand());
			$this->assign('token', $_SESSION['token']);
			$this->display('login');
			
		}
	}



	/**
	 *注册界面
	 */
	public function register(){
		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/index');
		}else{
			///////设置令牌/////////
			$token = uniqid(rand(), true);
			$_SESSION['token'] = $token;

			////////赋值并显示/////////
			$this->assign('rd',mt_rand());
			$this->assign('token', $token);
			$this->display('register');
			
		}

	}



	/**
	 *修改密码界面
	 */
	public function pass(){
		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (!isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/login');
		}else{
			///////设置令牌/////////
			$token = uniqid(rand(), true);
			$_SESSION['token'] = $token;

			//
			$this->assign('token', $token);
			$this->display('pass');
			
		}

	}



	/**
	 *登录操作
	 */
	public function loginAction(){

		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			header('Location:'.$this->strGroupUrl.'/index');
			die;
		}

		///////令牌验证///////////
		if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}

		//////过滤数据//////////////
		$form = array(
			array('userOrEmail','string','1-50'),
			array('password','string','6-30'),
			array('verify','string','4'),
			);
		$form = filterForm($form);
		if (!$form) {//过滤失败
			header('Location:'.$this->strControllerUrl.'/login');
			die;

		}

		////////验证码验证//////////
		if (!isset($_SESSION['verify']) || $_SESSION['verify'] != md5($form['verify'])) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}


		////////登录操作////////////
		$model = $this->M('User');
		$userid = $model->login($form['userOrEmail'],$form['password']);
		if (!empty($model->getError())) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}
		
		////////撤销令牌/////////
		if (isset($_SESSION['token'])) {
			unset($_SESSION['token']);
		}

		////////撤销验证码/////////
		if (isset($_SESSION['verify'])) {
			unset($_SESSION['verify']);
		}

		//设置cookie保存用户名或邮箱
		setcookie('userOrEmail',$form['userOrEmail'],time()+3600*24*365,'/');

		///设置会话
		$_SESSION['id'] = $userid;
		header('Location:'.$this->strGroupUrl.'/user');

	}



	




	/**
	 *注册操作
	 */
	public function registerAction(){
		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/index');
			die;
		}
			
		///////令牌验证///////////
		if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
			header('Location:'.$this->strControllerUrl.'/register');
			die;
		}

		//////过滤数据//////////////
		$form = array(
			array('username','string','6-30'),
			array('password','string','6-20'),
			array('email','string','5-50'),
			array('verify','string','4')
			);
		$form = filterForm($form);
		if (!$form) {//过滤失败
			header('Location:'.$this->strControllerUrl.'/register');
			die;

		}

		////////验证码验证//////////
		if (!isset($_SESSION['verify']) || $_SESSION['verify'] != md5($form['verify'])) {
			header('Location:'.$this->strControllerUrl.'/register');
			die;
		}

		////////注册操作////////////
		$model = $this->M('User');
		$arr = $model->register($form['username'],$form['password'],$form['email']);
		if (!empty($error = $model->getError())) {
			header('Location:'.$this->strControllerUrl.'/register');
			die;
		}

		////////撤销令牌/////////
		if (isset($_SESSION['token'])) {
			unset($_SESSION['token']);
		}

		////////撤销验证码/////////
		if (isset($_SESSION['verify'])) {
			unset($_SESSION['verify']);
		}

		
		//发送邮箱激活码
		$server = substr($arr['email'],strpos($arr['email'], '@')+1);
		$url ='http://mail.'.$server;
		header('Location:'.$this->strControllerUrl.'/code?url='.$url);

	}



	/**
	 *退出登录
	 */
	public function logout(){
		$sessionMysql = new SessionMysql;
		if (isset($_SESSION['id'])) {
			unset($_SESSION['id']);
			if (!isset($_SESSION['id'])) {///成功退出
				header('Location:' . DOMAIN);
			}else{
				$this->display('index');
			}
		}
		
	}



	



	/**
	 *修改密码操作
	 */
	public function passAction(){
		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (!isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}
			
		///////令牌验证///////////
		if (!isset($_POST['token']) || $_POST['token'] != $_SESSION['token']) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}

		//////过滤数据//////////////
		$form = array(
			array('oldPass','string','6-30'),
			array('newPass','string','6-30'),
			);
		$form = filterForm($form);
		if (!$form) {//过滤失败
			header('Location:'.$this->strControllerUrl.'/pass');
			die;

		}

		////////修改密码操作////////////
		$model = $this->M('User');
		$model->setPass($_SESSION['id'],$form['oldPass'],$form['newPass']);
		if (!empty($error = $model->getError())) {
			header('Location:'.$this->strControllerUrl.'/pass');
			die;
		}

		////////撤销令牌/////////
		if (isset($_SESSION['token'])) {
			unset($_SESSION['token']);
		}

		//////跳转///////////
		error('修改成功');
		jump($this->strControllerUrl.'/index');


	}



	/**
	 *修改头像操作
	 */
	public function faceAction(){

		///////////////判断是否已经登录////////////
		$sessionMysql = new SessionMysql;
		if (!isset($_SESSION['id'])) {
			header('Location:'.$this->strControllerUrl.'/login');
			die;
		}

		////////////////过滤数据/////////////////
		$model = $this->M('User');
		$config = $model->getConfig('blog');
		$file = array(
			array('face','image/gif,image/jpeg,image/jpg,image/png',$config['maxFace']),
			);
		if (!filterFile($file)) {//过滤失败
			error('文件不符合');
			jump($this->strControllerUrl.'/index');
			die;

		}

		////移动文件到指定路径并判断是否成功///////
		$fileName1 = '/tmp/'.time() . '_' . $_FILES['face']['name'];//缩略图前存储路径
		$fileName2 = '/face/'.time() . '_' . $_FILES['face']['name'];//缩略图后存储路径
		if(!move_uploaded_file($_FILES['face']['tmp_name'],FILE_PATH.$fileName1)){
			error('上传失败');
			jump($this->strControllerUrl.'/index');
			die;
		}

		///将上传的文件生成缩略图////////
		import('Image');
		if (!Image::thumb(FILE_PATH.$fileName1,FILE_PATH.$fileName2,$config['widthFace'],$config['heightFace'])) {
			$faceUrl = DOMAIN.'/file'.$fileName1;
		}else{
			$faceUrl = DOMAIN.'/file'.$fileName2;
		}

		////////修改头像操作////////////
		$model->setFace($_SESSION['id'],$faceUrl);
		if (!empty($model->getError())){
			header('Location:'.$this->strControllerUrl.'/index');
			die;
		}

		//////跳转///////////
		error('修改成功');
		jump($this->strControllerUrl.'/index');

	}



	/**
	 *验证邮箱激活码操作
	 */
	public function codeAction(){

		//////过滤数据//////////////
		$form = array(
			array('uid','int'),
			array('code','string','32')
			);
		$form = filterForm($form);
		if (!$form) {//过滤失败
			header('Location:'.$this->strControllerUrl);
			die;

		}

		////执行验证激活码的操作////////
		$model = $this->M('User');
		if ($model->verifyCode($form['uid'],$form['code'])) {
			error('恭喜您已验证邮箱');
		}

		jump($this->strControllerUrl.'/login');
		//header('Location:'.$this->strControllerUrl.'/login');
		//用header将屏蔽error();

	}

}