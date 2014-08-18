<?php defined('IN_FATE') or die('Access denied');

		/**
		 * @brief ģ�ͻ���
		 * @param $db     ���ݿ��������
		 * @param $fields Ҫ��ѯ���ֶ�
		 * @param $join   �����ִ�
		 * @param $where  ��ѯ�ִ�
		 * @param $order  �����ִ�
		 * @param $limit  ȡ������
		 **/

		class IModel {
						
					protected $db='';      
					protected $fields='*'; 
					protected $join='';    
					protected $where='';
					protected $order='';  
					protected $limit='';   
					
					/**
					 * @breif ��ʼ������
					 **/
					public function  __construct(){
						
								$this->db = new IDb;
				  }
				  				  
				  /**
				  * @brief �л���������
				  **/
				  
				  /*
				  public function switch_db($config){
				  	
				  		   $this->db = $this->driver->analyze_db($config);
				  		   return $this;
				  }
				  */
				  
				  /**
				  * @brief �л����ݿ�����
				  **/
				  
				  /*
				  public function switch_db_driver($db_type,$dir=''){
				  	
				  			$this->db = $this->driver->analyze_db('',$db_type,$dir);
				  		  return $this;
				  }
				  */
				  
				 /**
				  * @brief �������ݿ����
				  **/					  
				  public function db(){
				  		return $this->db;
				  }
				  
				 /**
				  *	@brief ����fields�ֶ�
				  **/
				  
				  public function fields($fields='*'){
				  	
				  	$this->fields = $fields;
				  	return $this;
				  }
				  
				 /**
				  *	@brief ����join�ִ� 
				  **/
				 public function join($join=''){
					 	
					 	$this->join  = empty($join)?'':$join;
				 		return $this;
				 }
				 
				/**
				 * @brief ����where�ִ�
				 **/	 
				 public function where($where=''){
				 	
				 		$this->where  = empty($where)?'':' WHERE '.$where;
				 		return $this;
				 }
				 
				/**
				 * @brief ����order�ִ�
				 **/
				 public function order($order=''){
				 	
				 		$this->order  = empty($order)?'':' ORDER BY '.$order;
				 		return $this;
				 }
				 
				 /**
				 * @brief ���� limit �ִ�
				 **/
				 public function limit($limit=''){
				 	
				 		$this->limit  = empty($limit)?'':' LIMIT '.$limit;
				 		return $this;
				 }
				 
				/**
				 * @brief ƴװsql 
				 **/
				 public function sql(){
				 		
				  	$sql = "SELECT ".$this->fields." FROM  ".$this->table.''.$this->join.$this->where.$this->order.$this->limit;
				 		return $sql;
				 }
				 
				 /**
				  * @brief ִ��sql��� ��ȡ��������
				  **/ 
				  public function find($sql,$type='assoc',$cacheResult=true){
				  				
							$result = $this->db()->query($sql,$cacheResult);
							$all = array();
							while( $value = $this->db()->fetchArray($result,$type)){
				
									$all[]=$value;	
							}
							$this->db()->free($result);
							return $all;
				  }
					  
				 /**
				  * @brief ִ��sql��� ���һ������
				  **/
				  public function findOne($sql,$type='assoc',$cacheResult=true){
				  	
							$result = $this->db()->query($sql,$cacheResult);
						  $one    = $this->db()->fetchArray($result,$type);
						  $this->db()->free($result);
						  return $one;
				  }
					  
				 /**
					* @breif �������
					**/	  
					public function insert($tbName,$arr){
					  	
					  	 	$str = "(`".implode('`,`',array_keys($arr))."`) VALUES ('".implode("','",$arr)."')";
					  	 	$sql= "INSERT INTO `$tbName` $str";
					  	 	return $this->db()->query($sql);
					}
					  
					public function insertStr($tbName,$fields,$values){
					  	
					  		$sql ="INSERT INTO `$tbName` $fields VALUES $values";
					  		return $this->db()->query($sql);	
					}
					  
				  /**
				   * @breif �޸Ĳ���
				   **/
				  public function update($tbName,$arr,$where='1=1'){
				  		
				  		$str='';
				  		foreach($arr as $k=>$v){
				  			$str.=" `$k`='{$v}',";
				  		}
				  		$str=rtrim($str,',');
				  		$sql = "UPDATE `$tbName` SET $str WHERE $where";
				  		return $this->db()->query($sql);
				  }
				  
				 /**
				  * @breif ɾ������ 
				  **/
				  public function delete($tbName,$where){
				  	
				  		$sql = "DELETE FROM `$tbName` WHERE $where";
				  		$this->db()->query($sql);
				  }
		}

?>