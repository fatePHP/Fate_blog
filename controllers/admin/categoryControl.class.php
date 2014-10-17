<?php
    /*
     * @brief 分类控制器
     */
    class categoryControl extends adminLayoutControl {
        
        /**
         * @brief 首页-分类
         */
        public function index(){
            
            $all = $this->model()->getAll();
            $treeData = $this->model()->getTree($all);
            $data = array(
                  'treeData'=>$treeData,
                  'total'=>count($all)
            );
            $this->render('admin/category/index',$data);
        }
        
        /**
         * @brief 编辑-分类
         */
        public function edit(){
    
            $cid = $_GET['id'];
            
            if(isset($_POST['doSubmit'])){

            }else{
                
                $infoData = $this->model()->getInfoById($cid);
                $treeData = $this->model()->getTree();
                $data = array(
                     'category'=>$infoData,
                     'tree'=>$treeData,
                );
            }
            $this->render('admin/category/edit',$data);
        }
        
        /**
         * @brief 添加-分类
         */
        public function add(){
              
            $termData = array(
                 'name'=>$_POST['tag-name'],
                 'slug'=>$_POST['slug']
            );
            
            $termTaxonomy = array(
                 'parent'=>$_POST['parent'],
                 'description' => $_POST['description'],
                 'taxonomy'=>$_POST['taxonomy']
            );
            
            $flag = $this->model()->add(array('term'=>$termData,'termTaxonomy'=>$termTaxonomy));
            if(!$flag)
                die('插入失败');
            header('Location:/admin/category');
            
        }
        
        /*
         * @brief 删除-分类
         */
        public function del(){
            
            
        }

        
    }


?>