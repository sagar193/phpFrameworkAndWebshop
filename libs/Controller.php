<?php

class Controller  
{
    public $admin;

    function __construct(){
        
        $this->view = new View();
        Session::init();
    }

    public function loadModel($name)
    {
        if (file_exists($GLOBALS['rep'].$name.'_repository.php')){
            require $GLOBALS['rep'].$name.'_repository.php';

            $modelname = $name. '_repository';
            $this->repository = new $modelname;
        }
    }

    public function admin()
    {
        if(isset($this->admin))
        {
            if (Session::get('admin') === true)
            {
                return true;
            }
            else
            {
                $this->renderController('erno_forbidden');
                exit();
            }
        }
        else 
        {
            $this->renderController('erno_forbidden');
            exit();
        }
    }

    public function isAdmin()
    {
        if(isset($this->admin))
        {
            if (Session::get('admin') === true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
    }

    public function renderController($name)
    {
        if($this->isAdmin()){
            $this->view->renderAdmin($name);
        } else{
            $this->view->renderUser($name);
        }


    }
}
