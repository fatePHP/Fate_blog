<?php
        /*
         * @brief 前端控制器
         */
        class homeControl extends homeLayoutControl{
            
                /**
                 * @brief 首页-列表页
                 */
                public function index(){
                    
                    $articleModel = $this->model('article','admin');
                    $categoryModel = $this->model('category','admin');
                    
                    $articleAll = $articleModel->getAll();
                    $articleRandom = $articleModel->getRandom();
                    $articleArchive = $articleModel->getTime();
                    $articleCategory =  array();
                   
                    $data = array(
                        'articleAll'=>$articleAll,
                        'articleRandom'=>$articleRandom,
                        'articleArchive'=>$articleArchive,
                        'articleCategory'=>$articleCategory
                    );
                    
                    $this->render('home/index',$data);
                }
                
                /**
                 * @brief 详情页
                 */
                public function detail(){
                    
                    $this->render('home/detail');
                }

        }


?>