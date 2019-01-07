<?php
require 'repsitory/category.php';

class Product extends Controller 
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function get()
    {
        $this->view->render('product');
    }
}
