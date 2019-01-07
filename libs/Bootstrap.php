<?php

class Bootstrap {
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $admin = 0;
        if ($url[0]==="admin")
        {
            $admin++;
        }
        
        if (empty($url[$admin])){
            $url[$admin] = "home";
        }
        $file = $GLOBALS['contr'] .$url[$admin]. '.php';
        
        if (file_exists($file))
        {
           require $file;
           $controller = new $url[$admin];
           $controller->loadModel($url[$admin]);
        }
        else
        {
            require $GLOBALS['contr']. '/erno.php';
            $controller = new Erno();
            $controller->displayError("page cannot be found");
            return false;
        }

        if($admin === 1)
        {
            $controller->admin = true;
        }
        
        if (isset($url[$admin+1]))
        {
            if(method_exists($controller, $url[$admin+1])){
                if (isset($url[$admin+2])){
                    $controller->{$url[$admin+1]}($url[$admin+2]);
                } else{
                    $controller->{$url[$admin+1]}();
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
                
    }
}