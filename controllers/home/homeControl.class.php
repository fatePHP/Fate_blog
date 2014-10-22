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
                    $articleAll = $articleModel->getAll();

                    $data = array(
                        'articleAll'=>$articleAll,
                    );
                    
                    $this->render($data);
                }
                
                /**
                 * @brief 详情页
                 */
                public function detail(){
                    
                    $id = $_GET['id'];
                    $articleModel = $this->model('article','admin');
                    $info = $articleModel->getInfoById($id);
                    $data = array(
                          'article'=>$info
                    );
                    $this->render($data);
                }

        }


?>