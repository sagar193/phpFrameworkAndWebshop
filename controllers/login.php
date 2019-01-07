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
        $user = $this->repository->getUserByName($_POST['username']);
        if ($user){
            $same = $user->checkPassword($_POST['password']);
            if ($same){
                Session::set('id', $user->id);
                $this->view->render('login');
            } else {
                $this->view->msg = "Password is incorrect";
                $this->view->render('login');
            }
        } else{
            $this->view->msg =  "User doesn't exist";
            $this->view->render('login');
        }
    }

    public function register()
    {
        $success = $this->repository->addUser($_POST['emailAddress'], $_POST['username'], $_POST['password']);
        if($success)
        {
            $user = $this->repository->getUserByName($_POST['username']);
            Session::set('id', $user->id);
            $this->view->render('home');
        } 
        else
        {
            $this->view->msg = "Password already in use";
            $this->view->render('login');
        }
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
