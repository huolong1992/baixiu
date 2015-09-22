<?php
/**
 *index分组配置文件
 */

return array(
	////博文分页栏///////
	'pagecount' => 10,//每页显示博文的数量
	'pagenum' => 6,//分页栏总共显示的页数
	'clickcount' => 10,//阅读排行显示博文的数量

	'maxFace' => 2000000,//上传头像最大值2M,字节为单位
	'widthFace' => 200,//上传头像缩略图宽度px
	'heightFace' => 200,//上传头像缩略图高度px

	////邮箱/////////
	'mailServer' => 'smtp.sina.com',//SMTP服务器 
	'mailPort' => 25,//邮件发送端口
	'mailCharset' => 'UTF-8',//邮件字符集
	'mailEncoding' => 'base64',//编码方式
	'mailUsername' => 'baixiume@sina.com',//邮箱用户名
	'mailPassword' => 'password',//邮箱密码
	'mailExpire' => 3600,//激活码过期间隔1小时=3600s

	/////Memcached//////
	///Memcached主机1
	'm1_host' => 'localhost',///////Memcached服务器主机
	'm1_port' => 11211,//////Memcached服务器端口号
	'm1_user' => 'user',//////单个用户的信息
	///Memcached主机2
	'm2_host' => 'huolong.local',
	'm2_port' => 11211,
	);

?>