<?php

class Login extends Controller 
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function get()
    {
        $this->view->render('login');
    }

    public function login()
    {
        $this->model->login();
    }

    public function register()
    {
        $this->model->register();
    }

    public function getAll()
    {
        $this->model->getAll();
    }
}
