<?php

class Controller_User extends System_Controller
{
   public function profileAction()
            {
            $args=  $this->_getArguments();
            $userId=$args['id'];
            try{
            $modelUser = Model_User::getById($userId);
            $this->view->setParam('user', $modelUser);
            }
            catch (Exception $e){
            }
            }
    public function indexAction()
            {
        
            }
}
