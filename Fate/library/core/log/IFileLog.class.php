<?php defined('IN_FATE') or die('Access denied');
	
	 		/**
	 		 * @brief �ļ���־��
	 		 * @param $maxFileSize ��־�ļ���С ��λΪKB Ĭ�����Ϊ1M
	 		 * @param $maxFileNum  ��־�ļ���������      Ĭ��Ϊ5��
	 		 * @param $filePath 	 ��־�ļ�·��
	 		 * @param $fileName    ��־�ļ�����
	 		 **/
	 		 
	 		 class IFileLog extends ILog{
	 		 				
	 		 				private $maxFileSize = '1024';
	 		 				private $maxFileNum  = '5';
	 		 				private $logFilePath = '';
	 		 				private $logFile = '';
	 		 				
	 		 				/**
	 		 				 * @brief д����־�ļ�
	 		 				 * @param $message ��־��Ϣ
	 		 				 * @param $file    ��־�ļ�
	 		 				 **/
	 		 				public function write($message,$file){
	 		 					
 		 							$this->logFile = $this->getLogPath().'/'.$file;
 		 							
									if(@filesize($this->logFile)>$this->getMaxFileSize()*1024){
											$this->distribution();
									}
									
									$fp=@fopen($this->logFile,'a');
									
									@flock($fp,LOCK_EX);
									if(is_array($message)){
										foreach($message as $m)
										@fwrite($fp,date('Y-m-d H:i:s')." $m\n");
									}else{
										@fwrite($fp,date('Y-m-d H:i:s')." $message\n");
									}
									@flock($fp,LOCK_UN);
									@fclose($fp);
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ��ȡ��־�ļ�����
	 		 				 * @param $file  ��־�ļ�
	 		 				 **/
	 		 				public function read($file,$length=''){
	 		 					
	 		 						$logFile = $this->getLogPath().'/'.$file;
	 		 						
	 		 						$fp = @fopen($logFile,'r');
	 		 						//$content = fgets($fp,$length); ���ж�ȡ
	 		 						$content = empty($length)? fread($fp,filesize($logFile)):fread($fp,$length);
	 		 						@fclose($fp);
	 		 						echo $content;
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ������־�ļ�
	 		 				 **/
	 		 				public function distribution(){
	 		 							
										$max=$this->getMaxLogFiles();
										
										for($i=$max;$i>0;--$i)
										{
											$tempFile=$file.'_'.$i;
											if(is_file($tempFile))
											{
												if($i===$max)
													@unlink($file.'_'.$i);
												else
													@rename($tempFile,$file.'_'.($i+1));
											}
										}
										
										if(is_file($file))
											@rename($file,$file.'_1'); 
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ��ȡ��־�ļ����Ƹ���
	 		 				 **/
	 		 				public function getMaxFileNum(){
	 		 							
	 		 							return $this->maxFileNum;
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ������־�ļ����Ƹ���
	 		 				 **/
	 		 				 
	 		 				public function setMaxFileNum($num){
	 		 					
 		 								$num = intval($num);
 		 						    $num = $num>0 ? $num:1;
 		 								$this->maxFileNum = $num;
 		 								return $this;
	 		 				}
	 		 				 
	 		 				/**
	 		 				 * @brief ��ȡ��־�ļ����ƴ�С
	 		 				 **/
	 		 				public function getMaxFileSize(){
	 		 					
	 		 							return $this->maxFileSize;
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ������־�ļ����ƴ�С
	 		 				 **/
	 		 				public function setMaxFileSize($size){
	 		 					
	 		 							$size = intval($size);
	 		 						  $size = $size>0 ? $size:1;
	 		 					    $this->maxFileSize = $size;
	 		 					    return $this;
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ��ȡ��־�ļ�·��
	 		 				 **/
	 		 				public function getLogPath(){
	 		 					
	 		 							 return $this->logFilePath;
	 		 				}
	 		 				
	 		 				/**
	 		 				 * @brief ������־�ļ�·��
	 		 				 **/
	 		 				public function setLogPath($path){
	 		 					
	 		 							 $path = realPath($path);
	 		 							 if(is_dir($path) && is_writeable($path)){
	 		 						  	 $this->logFilePath = $path;
	 		 						 	 }
	 		 						   return $this;
	 		 				}
	 		 	
	 		 }


?>