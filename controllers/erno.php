<?php

class Erno extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->view->render('erno');
    }

    public function displayError($errormessage)
    {
        $this->view->msg = $errormessage;
        $this->view->render('erno');
    }
}

?>