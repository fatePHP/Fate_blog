<?php defined('IN_FATE') or die('Access denied');
			
			/**
			 * @brief ���ݿ�������
			 * @param $type ���ݿ�����
			 * @param $db   ���ݿ����
			 **/
			 
			class IDb {
				
						private $type;
						private $db;
						
						/**
						 * @brief ��ʼ������ 
						 **/
						public function __construct($type=''){
								
								$db_config = IApp::config('db');
								$this->type = empty($config['type'])?'mysql':$config['type'];
								$dbName = 'I'.ucfirst($this->type);
								$this->db = IApp::object($dbName,$db_config);
								return $this->db;
						}

			}
?>