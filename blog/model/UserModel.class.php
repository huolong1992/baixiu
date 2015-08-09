<?php
/**
 *User模型
 *
 *@author 王永强<1442022614@qq.com>
 */
class UserModel extends Model{


	/**
	 *根据id获取用户信息
	 *
	 *@param $nId 用户id
	 */
	public function getInfoById($nId){
		////////预处理/////////
		$sql = 'select username,face,email,phone,count from blog_user where id=? limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//格式化参数
			$nId = intval($nId);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $nId, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			$result = $stmt->fetch();
			if (!empty($result)) {
				return $result;
			}else{
				$this->error['empty'] = '暂无数据';
			}

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
	}


	/**
	 *实现用户登录
	 *
	 *@param $strUserOrEmail 用户名或者邮箱
	 *@param $strPassword 密码
	 *@return true/false
	 */
	public function login($strUserOrEmail,$strPassword){

		////////预处理/////////
		$sql = 'select id from blog_user where username=? or email=? and password=?  and isverify=1 limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//生成安全密码
			$strPassword = hash_hmac(DB_ALGO,$strPassword, DB_SALT);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $strUserOrEmail, PDO::PARAM_STR);
			$stmt->bindParam(2, $strUserOrEmail, PDO::PARAM_STR);
			$stmt->bindParam(3, $strPassword, PDO::PARAM_STR);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			$result = $stmt->fetch();
			if (!empty($result['id'])) {
				return $result['id'];
			}else{
				$this->error['notExist'] = '用户不存在';
			}

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}

	}



	/**
	 *实现用户注册
	 *
	 *@param $strUsername 用户名
	 *@param $strPassword 密码
	 *@param $strEmail 电子邮箱
	 *@return true/false
	 */
	public function register($strUsername,$strPassword,$strEmail){

		////////预处理/////////
		$sql = 'insert into blog_user(username,password,email) values(?,?,?)';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//生成安全密码
			$strPassword = hash_hmac(DB_ALGO,$strPassword, DB_SALT);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $strUsername, PDO::PARAM_STR);
			$stmt->bindParam(2, $strPassword, PDO::PARAM_STR);
			$stmt->bindParam(3, $strEmail, PDO::PARAM_STR);

			//执行查询
			$stmt->execute();

			///根据插入表的行数返回
			if ($stmt->rowCount()==1) {

				////生成邮箱激活码并插入数据库//
				$uid = self::$db->lastInsertId();
				$code = hash_hmac(DB_ALGO, $strUsername, DB_SALT);
				$time = time();
				$sql = "insert into blog_code(uid,code,time) values($uid,'$code',$time)";
				$stmt = self::$db->query($sql);

				///返回用户id和邮箱//////
				if ($stmt->rowCount() == 1) {

					///发送激活码/////
					$subject = 'baixiume注册邮箱验证';
					$to = $strEmail;
					$url = DOMAIN.'/blog/user/codeAction?uid='.$uid.'&code='.$code;
					$content = '亲爱的用户：<b>'.$strUsername.'</b><br/>
<a href="'.$url.'">您已经成为baixiume的会员，点击这里激活您的邮箱</a>';
					if ($this->sendMail($subject,$to,$content)) {
						$arr['id'] = $uid;
						$arr['email'] = $strEmail;
						return $arr;
					}else{
						$this->error['mail'] = '发送激活码失败';
					}
					
				}else{
					$this->error['code'] = '生成邮箱激活码出错';
				}
				
			}else{
				$this->error['insert'] = '插入时出错';
			}

		} catch (PDOException $e) {
			$this->error['query'] ='查询出错';
		}
		
	}



	/**
	 *修改密码
	 *
	 *@param $nId 该用户id
	 *@param $strOldPass 旧密码
	 *@param $strNewPass 新密码
	 *@return true/false
	 */
	public function setPass($nId, $strOldPass, $strNewPass) {
		////////预处理/////////
		$sql = 'update blog_user set password=? where id=? and password=? limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//格式化参数
			$nId = intval($nId);

			//生成安全密码
			$strOldPass = hash_hmac(DB_ALGO,$strOldPass, DB_SALT);
			$strNewPass = hash_hmac(DB_ALGO,$strNewPass, DB_SALT);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $strNewPass, PDO::PARAM_STR);
			$stmt->bindParam(2, $nId, PDO::PARAM_INT);
			$stmt->bindParam(3, $strOldPass, PDO::PARAM_STR);

			//执行查询
			$stmt->execute();

			///根据更新表的行数返回
			if ($stmt->rowCount()==1) {
				return true;
			}else{
				$this->error['update'] = '修改密码出错';
			}

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
	}



	/**
	 *修改头像
	 *
	 *@param $nId 该用户id
	 *@param $strFaceUrl 头像url地址
	 *@return true/false
	 */
	public function setFace($nId,$strFaceUrl) {
		////////预处理/////////
		$sql = 'update blog_user set face=? where id=? limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//格式化参数
			$nId = intval($nId);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $strFaceUrl, PDO::PARAM_STR);
			$stmt->bindParam(2, $nId, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			///根据更新表的行数返回
			if ($stmt->rowCount()==1) {
				return true;
			}else{
				$this->error['update'] = '修改头像出错';
			}

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
	}



	/**
	 *激活码验证操作
	 *
	 *@param $uid int 用户id
	 *@param $code string 激活码
	 *@return true/false
	 */
	public function verifyCode($uid, $code){
		$sql = 'select time from blog_code where uid=? and code=? limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {

			//格式化参数
			$uid = intval($uid);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $uid, PDO::PARAM_INT);
			$stmt->bindParam(2, $code, PDO::PARAM_STR);

			//执行查询
			$stmt->execute();

			/////判断激活码是否过期//////////
			$result = $stmt->fetch();
			if (!empty($result)) {
				//引进邮箱配置文件
				$config = getConfig(BLOG_GROUP);
				$interval = time()-$result['time'];
				if ($interval < $config['mailExpire']) {
					$sql = 'update blog_user set isverify=1 where id='.$uid;
					$stmt = self::$db->query($sql);
					if ($stmt->rowCount() == 1) {
						return true;
					}
				}else{
					$this->error['expire'] = '您的邮箱激活码已过期';
				}
			}else{
				$this->error['failed'] = '邮箱验证失败';
			}

			

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}

	}



	/**
	 *发送邮寄
	 *
	 *@param $subject string 邮件主题
	 *@param $to string 发送目标邮箱
	 *@param $content string 邮件主要内容
	 */
	protected function sendMail($subject,$to,$content){

		//引进PHPMailer类
		import('PHPMailer');

		//引进邮箱配置文件
		$config = $this->getConfig(BLOG_GROUP);

		$mail = new PHPMailer(); //实例化
		$mail->IsSMTP(); // 启用SMTP
		$mail->Host = $config['mailServer']; //SMTP服务器 
		$mail->Port = $config['mailPort'];  //邮件发送端口
		$mail->SMTPAuth   = true;  //启用SMTP认证

		$mail->CharSet  = $config['mailCharset']; //字符集
		$mail->Encoding = $config['mailEncoding']; //编码方式

		$mail->Username = $config['mailUsername']; //邮箱用户名
		$mail->Password = $config['mailPassword'];  //邮箱密码
		$mail->Subject = $subject; //邮件标题

		$mail->From = $config['mailUsername'];  //发件人地址（也就是你的邮箱）
		$mail->FromName = "baixiume";  //发件人姓名

		$mail->AddAddress($to, "亲");//添加收件人（地址，昵称）

		//$mail->AddAttachment('xx.xls','我的附件.xls'); // 添加附件,并指定名称
		$mail->IsHTML(true); //支持html格式内容
		//$mail->AddEmbeddedImage("logo.jpg", "my-attach", "logo.jpg"); //设置邮件中的图片
		$mail->Body = $content; //邮件主体内容

		//发送
		if(!$mail->Send()) {
			$this->error['sendMail'] = '邮箱激活码发送失败';
		} else {
			return true;
		}
	}
	

}