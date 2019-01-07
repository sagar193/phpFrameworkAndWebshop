<?php

class Category extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->view->categories = $this->repository->getAllCategories();
        echo "<br/>";
        $this->view->render('category');
    }

    public function add()
    {
        $success = $this->repository->addCategory($_POST['CategoryName']);
        if($success)
        {
            $user = $this->repository->getCategoryByName($_POST['CategoryName']);
            header('location: ../category');
        } 
        else
        {
            $this->view->msg = "Failed to add category";
            header('location: ../category');
        }
    }
}