<?php

    class adminControl extends adminLayoutControl {
                                        
                public function index(){
                    
                     $this->render('admin/index');
                }
                
                public function setting(){
                    
                    $this->render('admin/setting');
                }
                
                public function setting_write(){
                    
                    $this->render('admin/setting_write');
                }
                
                public function setting_read(){
                    
                    $this->render('admin/setting_read');
                }
                
                public function setting_discussion(){
                    
                    $this->render('admin/setting_discussion');
                }
                
                public function setting_media(){
                    
                    $this->render('admin/setting_media');
                }
                
                public function setting_url(){
                    
                    $this->render('admin/setting_url');
                }
    }

?>