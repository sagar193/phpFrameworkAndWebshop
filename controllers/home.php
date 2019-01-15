<?php

class Home extends Controller 
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($arg = false)
    {
        include 'repository/category_repository.php';
        $CateRepo = new Category_Repository();
        $this->view->category = $CateRepo->getAllCategories();

        
        $this->renderController('home');
    }
}


?>