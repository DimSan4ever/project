<?php
class Controller_Index 
{
    public $view;

    public function indexAction()
   {
        include SITE_PATH.'View'.DS.'Index'.DS.'index.phtml';   
   }
}
