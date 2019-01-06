<?php

class View{

    function __construct()
    {
        
    }

    public function render($name)
    {
        require $GLOBALS['view'].'header.php';
        require $GLOBALS['view'].$name. '.php'; 
        require $GLOBALS['view'].'footer.php';
    }
}