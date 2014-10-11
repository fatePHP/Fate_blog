<?php 
    
    class articleModel extends IModel {
        
            public function init(){
                  $this->table = 'posts';
            }
            
            public function getAll(){
                
                $sql = $this->fields('*')->sql();
                $data = $this->fetchAll($sql);
                return $data;
            }
        
        
    }


?>