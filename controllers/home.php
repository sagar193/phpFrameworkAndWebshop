<?php

class Home extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($arg = false)
    {
        require 'models/product_model.php';
        $Product_Model = new Product_Model();

        $this->view->render('home');
    }
}


?>