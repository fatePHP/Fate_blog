<?php  defined('IN_FATE') or exit('Access denied');

return  Array(

					 'debug'=>true,																 //调试开关
					 
					 'app'=>array(																 //应用配置
					 		 'extensionPath'=>array(),								 //第三方扩展路径
					 		 'timezone'=>'Asia/Shanghai',							 //默认时区
					 		 'language'=>'zh_cn',											 //默认加载语言包
					 		 'defaultControl'=>'home',								 //默认控制器
		        	 'defaultAction'=>'index',								 //默认方法
		        	 'charset'=>'utf-8',											 //默认字符集
		        	 'errorLevel'=>E_ALL,						 					 //默认错误级别
					 ),
					 
					 'db'=>array(
		           'type'   =>'mysql',											 //数据类型
				       'host'   =>'localhost',             			 //数据库地址
				       'name'   =>'blog',              					 //数据库名字
				       'user'   =>'blog_admin',                  //数据库账号
				       'pwd'    =>'123blog456mysql',             //数据库密码
				       'prefix' =>'tb_',                         //数据库表前缀
				       'show_error'=>true,                       //是否输出显示数据库错误
				       'pconnect'=>false                         //是否使用持久链接 
		        ),
		        		        
		        'view'=>array(
		        	 'left'=>'<{',                              //左限制符
		       		 'right'=>'}>',														  //右限制符
		       		 'theme'=>'default',												//模板主题名称
		       		 'layout'=>'home',                					//模板布局文件
		       		 'suffix'=>'.html'                          //模板文件后缀 需要加'.'
		        ),
		                
						'cache'=>array(
						   'power'=>false,													  //缓存模板开关
						   'lifeTime'=>60*60*24												//缓存生命周期
						),
						
       			'log'=>array(
       				  'power'=>false,														//开启日志
       			),
       			
       			'cookie'=>array(													
       					'cookie_pre'=>'fate_',                 		//cookie前缀
       			
       			),
       				           
		       'httpStatusCode'=>array(											  //http请求状态码
								 '404' => ''                    				 
		        )

);

?>