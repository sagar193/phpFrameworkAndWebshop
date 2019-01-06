<?php

class About extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->view->render('about');
    }

}
