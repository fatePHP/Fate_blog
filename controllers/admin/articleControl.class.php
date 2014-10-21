<?php
    /**
     * @brief 文章控制器
     **/
    class articleControl extends adminLayoutControl {
                                    
            /*
             * @brief 列表-文章
             */
            public function index(){
                
                 $articleData = $this->model->getAll();
                 $timeData = array();
                 $timeArr = $this->model->getTime();
                 $categoryModel = $this->model('category','admin');
                 $categoryArr = $categoryModel->getAll();
                 $categoryData = array();
                 
                 foreach($timeArr as $time){
                      $timeData[$time['year'].$time['month']] = $time['year'].'年'.$time['month'].'月'; 
                 }
                 
                 foreach($categoryArr as $category){
                     $categoryData[$category['term_id']] = $category['name'];
                 }
                       
                 $data = array(
                             'articleData'=>$articleData,
                             'timeData'=> $timeData,
                             'categoryData'=>$categoryData
                         );
                 $this->render('admin/article/index',$data);
            }
            
            /*
             * @brief 编辑-文章
             */
            public function edit() {

                $this->render('admin/article/edit');
            }
                        
            /*
             * @brief 添加-文章
             */
            public function add(){

                $this->render('admin/article/edit');
            }
            
            /**
             * @brief 回收-文章
             */
            public function recycle(){
                
                
            }
            
            /*
             * @brief 删除-文章
             */
            public function del(){

            }
                        
     }

?>