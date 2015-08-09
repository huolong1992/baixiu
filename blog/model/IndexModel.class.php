<?php
/**
 *Index模型
 *
 *@author 王永强<1442022614@qq.com>
 */
class IndexModel extends Model{

	/**
	 *获得blog_category的数据,并按条件排序
	 *
	 *@param $nPage 开始偏移量
	 *@param $nPagecount 每页数量
	 *@param $strOrder 排序条件
	 *@return $arrList 二维数组 博文列表
	 */
	public function getList($nPage, $nPagecount, $strOrder){

		////////预处理/////////
		$sql = 'select * from blog_category order by ? limit ?,?';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {
			/////////格式化参数/////////
			$nPage = intval($nPage);
			$nPagecount = intval($nPagecount);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $strOrder, PDO::PARAM_STR);
			$stmt->bindParam(2, $nPage, PDO::PARAM_INT);
			$stmt->bindParam(3, $nPagecount, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			//die('查询出错');
			$this->error['query'] = '查询出错';
		}
	}


	/**
	 *获取指定表的数据总数
	 *
	 *@param $strTableName 表名
	 *@return $result[0] 返回数据总数
	 */
	public function getRowCount($strTableName){
		$sql = 'select count(*) from ' . $strTableName;
		$stmt = self::$db->query($sql);
		$result = $stmt->fetch();
		return $result[0];
	}



	/**
	 *获取文章详细内容
	 *
	 *@param $nCid 文章id
	 *@return $result['content'] string 文章详细内容
	 */
	public function getDetail($nCid){

		////////预处理/////////
		$sql = 'select content from blog_detail where cid=?';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}
		try {
			//格式化参数
			$nCid = intval($nCid);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $nCid, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result['content'];

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
		
	}



	/**
	 *获取文章详细内容以及标题等信息
	 *
	 *@param $nCid 文章id
	 */
	public function getDetailWithCategory($nCid){

		////////预处理/////////
		$sql = 'select c.title,c.time,c.click,c.reply,d.content from blog_category c,blog_detail d where c.id=d.cid and c.id=? limit 1';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}
		try {
			//格式化参数
			$nCid = intval($nCid);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $nCid, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			return $stmt->fetch(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
		
	}



	/**
	 *获取文章的评论
	 *
	 *@param $nCid 文章id
	 *@return 
	 */
	public function getReply($nCid){

		////////预处理/////////
		$sql = 'select content,time from blog_reply where cid=? order by time desc';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}
		try {
			//格式化参数
			$nCid = intval($nCid);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $nCid, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
		
	}


	/**
	 *将指定id的文章阅读次数加1
	 *
	 *@param $nCid 文章id
	 *@return true/false
	 */
	public function addClick($nCid){

		////////预处理/////////
		$sql = 'update blog_category set click=click+1 where id=?';
		if (!($stmt = self::$db->prepare($sql))) {
			$this->error['prepare'] = '预处理出错';
			die;
		}

		try {
			//格式化参数
			$nCid = intval($nCid);
			
			/////////绑定参数///////////
			$stmt->bindParam(1, $nCid, PDO::PARAM_INT);

			//执行查询
			$stmt->execute();

			/////////返回数据/////////////
			return $stmt->rowCount()==1 ? true : false;

		} catch (PDOException $e) {
			$this->error['query'] = '查询出错';
		}
		
	}
}

?>