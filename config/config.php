<?php  defined('IN_FATE') or exit('Access denied');

return  Array(

	 'debug'=>true,	//调试开关
	 'app'=>array(	//应用配置
			'extensionPath'=>array(),								 //第三方扩展路径
			'timezone'=>'Asia/Shanghai',							 //默认时区
			'language'=>'zh_cn',											 //默认加载语言包
			'control'=>'home',								 //默认控制器
		        'action'=>'index',								 //默认方法
		        'charset'=>'utf-8',											 //默认字符集
		        'errorLevel'=>E_ALL,						 					 //默认错误级别
                      ),
					 


);

?>