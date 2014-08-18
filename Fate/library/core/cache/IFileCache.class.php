<?php defined('IN_FATE') or die('access deneid');
			
			/**
			 * @brief �ļ�������
			 * @param $cacheDepth     ����Ŀ¼���;
			 * @param $cacheDir 		  ����Ŀ¼
			 * @param $cacheSuffix    �����ļ���׺
			 * @param $cacheKeyPrefix �������ǰ׺
			 * @param $gced           ����������ձ�־��
			 **/
			 
			class IFileCache extends ICache {
				
						private  $cacheDepth=2;
						private  $cacheDir;
						private  $cacheSuffix;
						private  $cacheKeyPrefix='fate_';
						private  $gced;
						
						/**
						 * @brief ��ʼ������
						 **/
						public function init(){
							
							
						}

						/**
						 * @brief ��ȡ����
						 * @param $key �Զ������
						 **/
						public function get($key){
							
							  $cacheKey  = $this->getCacheKey($key);
							  $cacheFile = $this->getCacheFile($cacheKey);
							  
							  if(is_file($cacheFile) && ($time=@filemtime($cacheFile))>time()){
							  	
							 		return $content = unserialize(file_get_contents($cacheFile));
							 			 
								}else if($time>0){
									
									@unlink($cacheFile);	
								}
							   
							  return false;
						}
						
						/**
						 * @brief ���û���
						 **/
						public function set($key,$value=''){
							
								$cacheKey  = $this->getCacheKey($key);
								$cacheFile = $this->getCacheFile($cacheKey);
						}
						
						/**
						 * @brief ɾ������
						 **/
						public function delete($key){
							
							
						}
						
            /**
             * @brief ��ȡ�������
             **/
						public function getCacheKey($key){
							
								 return md5($this->cacheKeyPrefix.$key);
						}
						
						/**
						 * @brief ��ȡ�����ļ���ַ
						 **/
						public function getCacheFile($cacheKey){
							
								$cacheFile = $cacheKey.$this->cacheSuffix
							  $cachePath = $this->cacheDir;
							  for($i=1;$i<$this->cacheDepth;$i++){
							  	 	$cachePath.=substr($cacheKey,($i-1)*2,2).'/';
							  }
							  $cachePath.= $this->cacheDir.'/';
								return $cachePath.$cacheFile;
						}
						
						/**
						 * @brief ������������
						 **/
						public function gc(){
							
							
						}
				
			}


?>