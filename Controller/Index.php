<?php
class Controller_Index
{
    public $view;
    public function indexAction()
   {
        $this->view = 'Hi it is '.__METHOD__;
   }
}
