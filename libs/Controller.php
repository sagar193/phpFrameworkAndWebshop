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
                header('location: ../error');
                exit();
            }
        }
        else 
        {
            header('location: ../error');
            exit();
        }
    }
}
