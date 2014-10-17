<?php

    return Array (
        
        
        'db'=>array(
		       'type'   =>'mysql',           //数据类型
                        'host'   =>'182.92.190.32',  //数据库地址
                        'name'   =>'fate_blog',      //数据库名字
                        'user'   =>'root',           //数据库账号
                        'pwd'    =>'zhujixia2012',   //数据库密码
                        'prefix' =>'blog_',          //数据库表前缀
                        'showError'=>true,          //是否输出显示数据库错误
                        'pconnect'=>false,          //是否使用持久链接 
                        'charset'=>'utf8'           //输出的字符集
		     ),
		        		        
	 'view'=>array(
		        'left'=>'<{',               //左限制符
		       	'right'=>'}>',              //右限制符
		       	'theme'=>'default',	    //模板主题名称
                        'layout'=>'home',           //模板布局文件
                        'suffix'=>'.html'           //模板文件后缀 需要加'.'
		        ),
		                
         'cache'=>array(
			'power'=>false,				
                        'lifeTime'=>60*60*24        //缓存生命周期
                        ),
						
       	  'log'=>array(
       			'power'=>false,		    //开启日志
       			),
       			
       	  'cookie'=>array(													
       			'cookie_pre'=>'fate_',      //cookie前缀
       			),
          'url'=>array(
                          'format'=>'pathinfo',
                          'rules'=>array(
                                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                                '<controller:\w+>/<action:\w+><id:\d+>' => '<controller>/<action>/<id>',
                                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>/<id>'
                          ),
                       )
    )


?>