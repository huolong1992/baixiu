<?php
/**
 *用mysql存储会话
 *
 *@author 王永强<1442022614@qq.com>
 */
class SessionMysql implements SessionHandlerInterface{

	/////////////数据库连接相关参数
	protected $db;
	protected $host;
	protected $port;
	protected $dbname;
	protected $user;
	protected $pass;
	protected $charset;

	//会话在服务器端保存时间
	protected $gc_maxlifetime;

	/**
	 *
	 */
	public function __construct(){
		////////由于调用session_start()之后会马上
		/////执行open()回调函数,所以所有的配置应该
		/////在这之前完成
		$this->host = DB_HOST;
		$this->port = DB_PORT;
		$this->dbname = DB_NAME;
		$this->user = DB_USER;
		$this->pass = DB_PASS;
		$this->charset = DB_CHARSET;
		$this->gc_maxlifetime = get_cfg_var('session.gc_maxlifetime');

		////////////设置回调函数,注意顺序不能改
		session_set_save_handler(
			array($this, 'open'),
			array($this, 'close'),
			array($this, 'read'),
			array($this, 'write'),
			array($this, 'destroy'),
			array($this, 'gc')
			);
		register_shutdown_function('session_write_close');
		session_start();
	}

	/**
	 *session_start()后执行打开数据库操作
	 *
	 *@param $save_path string 会话保存路径
	 *@param $name string 会话名称
	 */
	public function open($save_path, $name){
		///////////打开数据库
		$dns = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname;
		try {
			if (!isset($this->db)) {
				//实例化PDO
				$this->db = new PDO($dns, $this->user, $this->pass);

				//开启异常处理模式
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//设置字符集
				$this->db->query('set names ' . $this->charset);
			}

		} catch (PDOException $e) {
			die('can not create the database');
		}

		return true;

	}

	/**
	 *当调用 session_write_close() 函数之后，
	 *也会调用 close 回调函数
	 */
	public function close(){
		return true;
	}

	/**
	 *当调用 session_destroy() 函数执行的操作
	 *
	 *@param $session_id string 会话id
	 */
	public function destroy($session_id){
		$sql = 'delete from blog_session where sessionid=?';
		try {
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array($session_id));
			if ($stmt->rowCount() == 1) {
				return true;
			}
			return false;
			
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 *为了清理会话中的旧数据，PHP 
	 *会不时的调用垃圾收集回调函数
	 *
	 *@param $maxlifetime int 由session.gc_maxlifetime
	 *指定的会话存活时间
	 */
	public function gc($maxlifetime){
		$sql = 'delete from blog_session where expire<?';
		try {
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array(time()));
			return true;
			
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 *当调用$_SESSION时执行的操作,
	 *返回的数据会填充$_SESSION
	 *
	 *@param $session_id string 会话id
	 */
	public function read($session_id){
		$sql = 'select data from blog_session where sessionid=? and expire>?';
		try {
			$time = time();
			$stmt = $this->db->prepare($sql);
			$stmt->execute(array($session_id,$time));
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!empty($result['data'])){
				return $result['data'];
			}
			return '';

		} catch (PDOException $e) {
			return '';
		}
	}

	/**
	 *当调用$_SESSION保存数据时执行的操作,
	 *会保存$_SESSION数组所有数据
	 *
	 *@param $session_id string 会话id
	 *@param $session_data string 序列化后的数据
	 */
	public function write($session_id, $session_data){
		$sql = 'insert into blog_session(sessionid,data,expire) values(?,?,?) on duplicate key update data=?,expire=?';
		try {
			$expire = time() + $this->gc_maxlifetime;
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(1,$session_id,PDO::PARAM_STR);
			$stmt->bindParam(2,$session_data,PDO::PARAM_STR);
			$stmt->bindParam(3,$expire,PDO::PARAM_INT);
			$stmt->bindParam(4,$session_data,PDO::PARAM_STR);
			$stmt->bindParam(5,$expire,PDO::PARAM_INT);
			$stmt->execute();
			if($stmt->rowCount()==1 || $stmt->rowCount()==2){
				return true;
			}
			return false;
			
		} catch (PDOException $e) {
			file_put_contents('log.txt',$e->getMessage());
		}
	}
}