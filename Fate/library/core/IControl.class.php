<?php defined('IN_FATE') or die('Access denied');

			/**
			 * @brief ���п������Ļ���
			 * @param $view ��ͼ����
			 * @param $layout ��ͼģ��
			 **/
			 
			class IControl {
				    
						private $view;
						private $layout;
						
				    /**
				     * @brief ��ʼ������
				     **/
						public function __construct(){
								 
								 $this->view = IApp::object('IView');
						}    
						
						
						public function beginAction(){
							
						}
						
						public function endAction(){
							
						}
																
					 /**
						* @brief ģ�������ֵ
						* @param $k ����
						* @param $v ��ֵ
						**/
						public function setVal($k,$v){
							
									$this->view->assign($k,$v);
						}
						
					 /**
						* @brief ���ģ�� 
						**/			
						public function render($path,$value=array(),$layout=true){
							
									if(is_array($value) && !empty($value)){
						
											foreach($value as $k=>$v){
												 $this->view->assign($k,$v);
											}	
									}
								
									$this->view->display($path,$layout);
						}
						
					 /**
						* @brief ��ȡmodel��
						**/
						public function model($model){
							
							    return IApp::object($model.'Model');
						}
						
			}
			
?>