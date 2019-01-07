<?php

class Controller  
{
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
}
