<?php

class Home extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($arg = false)
    {
        if (Session::get('loggedIn') == true){
            echo "tat";
        } else {
            echo "lol";
        }

        $this->view->render('home');
    }
}


?>