<?php

class Bootstrap {
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        if (empty($url[0])){
            $url[0] = "home";
        }
        $file = $GLOBALS['contr'] .$url[0]. '.php';
        
        if (file_exists($file))
        {
           require $file;
           $controller = new $url[0];
           $controller->loadModel($url[0]);
        }
        else
        {
            require $GLOBALS['contr']. '/erno.php';
            $controller = new Erno();
            $controller->displayError("page cannot be found");
            return false;
        }
        
        //if (isset($url[2]))
        //{
        //    $controller->{$url[1]}($url[2]);
        //} 
        //else
        //{
            if (isset($url[1]))
            {
                if(method_exists($controller, $url[1])){
                    if (isset($url[2])){
                        $controller->{$url[1]}($url[2]);
                    } else{
                        $controller->{$url[1]}();
                    }
                } else {
                    require $GLOBALS['contr']. '/erno.php';
                    $controller = new Erno();
                    $controller->displayError("page cannot be found");
                    return false;
                }
            } else{
                $controller->get();
            }
        //}
        
    }
}