<?php
    /**
     * @brief 文章控制器
     **/
    class articleControl extends adminLayoutControl {
                                    
            /*
             * @brief 文章列表
             */
            public function index(){
                
                 $articleModel = $this->model();
                 $articleData = $articleModel->getAll(); 
                 $this->render('admin/article/index');
            }
            
            /*
             * @brief 编辑
             */
            public function edit() {

                $this->render('admin/article/edit');
            }
            
            /*
             * @brief 添加
             */
            public function add(){

                $this->render('admin/article/edit');
            }
            /*
             * @brief 删除
             */
            public function del(){

            }
            /*
             * @brief 文章分类
             */
            public function category(){

                $this->render('admin/article/category');
            }
            
            /*
             * @brief 文章标签
             */
            public function tag(){

                $this->render('admin/article/tag');
            }
     }

?>