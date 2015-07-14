<?php
class Controller_User 
{
   public $view; 
   
public function profileAction()
{
    $this-> view =  $this->args;
}
 public function indexAction()      
{
 $this->view = 'Hi it is '.__METHOD__;
}
}