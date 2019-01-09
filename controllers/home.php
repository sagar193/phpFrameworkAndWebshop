<?php

class Home extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($arg = false)
    {
        //$this->admin();
        $this->view->render('home');
    }
}


?>