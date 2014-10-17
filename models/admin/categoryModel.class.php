<?php
    /*
     * @brief 分类模型 
     */

    class categoryModel extends IModel{
        
        public  $categoryTree = array();
        
        public function init(){
                $this->table = 'term_taxonomy';
        }
                
        public function getAll(){
            
          $sql = $this->fields('*')->join(' as tt INNER JOIN blog_terms  as t ON tt.term_id=t.term_id')->order('tt.term_id DESC')->sql();
          $data = $this->fetchAll($sql);
          return $data;
        }
        
        public function getInfoById($id){
            
          $sql  = $this->fields('*')->join(' as tt INNER JOIN blog_terms  as t ON tt.term_id=t.term_id')->where('tt.term_id='.$id)->sql();
          $data = $this->fetchOne($sql);
          return $data;
        }
        
        public function getTree($data=array(),$level=0){
            
                if(empty($data))
                    $data = $this->getAll();
                
                $temp = array();
                
                if(empty($this->categoryTree)){
                    foreach($data as $k=>$category){
                        if($category['parent'] == 0){
                            $category ['level'] = $level;
                            $this->categoryTree[] = $category;
                        unset($data[$k]);
                        }
                    }
                    $this->getTree($data,1);
                }else{
                    
                    foreach($this->categoryTree as $v){
                        
                        $temp[] = $v;
                        foreach($data as $k =>$vv){
                            if($v['term_id']==$vv['parent']){
                                $vv['level'] = $level;
                                $temp[] = $vv;
                                unset($data[$k]);
                            }
                        }
                    }
                    
                    $this->categoryTree = $temp;
                    
                    if(!empty($data))
                        $this->getTree($data,$level+1);
                }
                
                return $this->categoryTree;
        }
                
        public function add($data){

                $termsData = $data['term'];
                $term_id = $this->insert('blog_terms',$termsData);
                $termTaxonomyData = $data['termTaxonomy'];
                $termTaxonomyData['term_id'] = $term_id;
                $flag = $this->insert('blog_term_taxonomy',$termTaxonomyData);
                
                return $flag;
            
        }
        
    }

?>