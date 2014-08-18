<?php

		class homeControl extends IControl{
			
				public function index(){
					
							$model = IApp::object('IModel');
							$this->setVal('content','欢迎使用FatePHP');
							$this->render('home/index');
				}	
					
		}


?>