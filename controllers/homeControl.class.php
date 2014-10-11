<?php

        class homeControl extends homeLayoutControl{
            
            
                public function index(){
                    
                    $this->setVal('content','欢迎使用FatePHP');
                    $this->render('home/index');

                }
                
                public function detail(){
                    $this->render('home/detail');
                }

        }


?>