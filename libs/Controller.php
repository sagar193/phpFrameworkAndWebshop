<?php

class Controller  
{
    function __construct(){
        
        $this->view = new View();

        
    }

    public function loadModel($name)
    {
        if (file_exists($GLOBALS['mod'].$name.'_model.php')){
            require $GLOBALS['mod'].$name.'_model.php';

            $modelname = $name. '_model';
            $this->model = new $modelname;
        }
    }
}
