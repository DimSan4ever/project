<?php
class Model_Product
{
   public static function getProducts()
    {
        $dbProduct     =  new Model_Db_Table_Product();
        $userData   =  $dbProduct->getAll();
                
        if($userData) {
           return $userData;
        }
        else {
            throw new Exception('User not found', System_Exception::NOT_FOUND);
        }
    }   
}