<?php  defined('IN_FATE') or exit('Access denied');

return  Array(

					 'debug'=>true,																 //���Կ���
					 
					 'app'=>array(																 //Ӧ������
					 		 'extensionPath'=>array(),								 //��������չ·��
					 		 'timezone'=>'Asia/Shanghai',							 //Ĭ��ʱ��
					 		 'language'=>'zh_cn',											 //Ĭ�ϼ������԰�
					 		 'defaultControl'=>'home',								 //Ĭ�Ͽ�����
		        	 'defaultAction'=>'index',								 //Ĭ�Ϸ���
		        	 'charset'=>'utf-8',											 //Ĭ���ַ���
		        	 'errorLevel'=>E_ALL,						 					 //Ĭ�ϴ��󼶱�
					 ),
					 
					 'db'=>array(
		           'type'   =>'mysql',											 //��������
				       'host'   =>'localhost',             			 //���ݿ��ַ
				       'name'   =>'blog',              					 //���ݿ�����
				       'user'   =>'blog_admin',                  //���ݿ��˺�
				       'pwd'    =>'123blog456mysql',             //���ݿ�����
				       'prefix' =>'tb_',                         //���ݿ��ǰ׺
				       'show_error'=>true,                       //�Ƿ������ʾ���ݿ����
				       'pconnect'=>false                         //�Ƿ�ʹ�ó־����� 
		        ),
		        		        
		        'view'=>array(
		        	 'left'=>'<{',                              //�����Ʒ�
		       		 'right'=>'}>',														  //�����Ʒ�
		       		 'theme'=>'default',												//ģ����������
		       		 'layout'=>'home',                					//ģ�岼���ļ�
		       		 'suffix'=>'.html'                          //ģ���ļ���׺ ��Ҫ��'.'
		        ),
		                
						'cache'=>array(
						   'power'=>false,													  //����ģ�忪��
						   'lifeTime'=>60*60*24												//������������
						),
						
       			'log'=>array(
       				  'power'=>false,														//������־
       			),
       			
       			'cookie'=>array(													
       					'cookie_pre'=>'fate_',                 		//cookieǰ׺
       			
       			),
       				           
		       'httpStatusCode'=>array(											  //http����״̬��
								 '404' => ''                    				 
		        )

);

?>