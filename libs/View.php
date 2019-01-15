<?php

class View{

    function __construct()
    {
        
    }

    public function renderAdmin($name)
    {
        //echo "admin"; return;
        require_once 'repository/menu_repository.php';
        $menu = new Menu_Repository();
        $this->header = $menu->getAllMenus();
        
        require $GLOBALS['view'].'header.php';
        require $GLOBALS['view'].$name. '.php';
        require $GLOBALS['view'].'footer.php';
    }

    public function renderUser($name)
    {
        //echo "user"; return;
        require_once 'repository/menu_repository.php';
        $menu = new Menu_Repository();
        $this->header = $menu->getAllMenus();
        
        require $GLOBALS['view'].'header.php';
        require $GLOBALS['view'].$name. '.php';
        require $GLOBALS['view'].'footer.php';
    }
}