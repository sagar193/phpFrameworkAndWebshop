<?php

class Login extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->renderController('login');
    }

    public function login()
    {
        $user = $this->repository->getUserByName($_POST['username']);
        if ($user){
            $same = $user->checkPassword($_POST['password']);
            if ($same){
                Session::set('id', $user->id);
                Session::set('username', $user->username);
                if ($user->admin == 1)
                {
                    Session::set('admin', true);
                    header("location: ../admin");
                } else {
                    header("location: ../");
                }
            } else {
                $this->view->msg = "Password is incorrect";
                $this->renderController('login');
            }
        } else{
            $this->view->msg =  "User doesn't exist";
            $this->renderController('login');
        }
    }

    public function register()
    {
        $success = $this->repository->addUser($_POST['emailAddress'], $_POST['username'], $_POST['password']);
        if($success)
        {
            $user = $this->repository->getUserByName($_POST['username']);
            Session::set('id', $user->id);
            Session::set('username', $user->username);
            $this->renderController('home');
        } 
        else
        {
            $this->view->msg = "Password already in use";
            $this->renderController('login');
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
