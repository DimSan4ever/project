<?php
class Controller_Product extends System_Controller
{
   public function indexAction()
            {
     try{
            $modelProduct = Model_Product::getProducts();
            $this->view->setParam('products', $modelProduct);
            }
            catch (Exception $e)
            {
            }
            }
       
         
}
