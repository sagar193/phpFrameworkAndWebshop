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
        if ($this->model->login() == true){
            $this->view->render('login');
        } else
        {
            $this->view->render('login');
        }
    }

    public function register()
    {
        $this->model->register();
    }

    public function getAll()
    {
        $this->model->getAll();
    }
    
    public function logout()
    {
        Session::destroy();
        header('location: ../');
    }
}
