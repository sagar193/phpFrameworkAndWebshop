<?php

class Category extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($msg = false)
    {
        $this->view->categories = $this->repository->getAllCategories();
        if ($msg)
        {
            $this->view->msg = $msg;
        }
        $this->renderController('category');
    }

    public function add()
    {
        $msg = 0;
        $success = $this->repository->addCategory($_POST['CategoryName']);
        if($success)
        {
            $item = $this->repository->getCategoryByName($_POST['CategoryName']);
            if($item){
                $msg = "Successfully added ". $_POST['CategoryName'];
            }
        } 
        else
        {
            $msg = "Failed to add category";
        }
        $this->get($msg);
    }

    public function detail($id)
    {
        $this->view->category = $this->repository->getCategoryByID($id);
        $this->renderController('categoryDetail');
    }

    public function edit($id)
    {
        $msg = 0;
        $success = $this->repository->editCategoryNameByID($id, $_POST['CategoryName']);
        if ($success){
            $msg = "record successfully editted";
        } else{
            $msg = "failed to edit record";
        }
        $this->get($msg);
    }

    public function delete($id)
    {
        $msg = 0;
        $success = $this->repository->delete($id);
        if ($success){
            $msg = "record successfully deleted";
        } else{
            $msg = "failed to delete record";
        }
        $this->get($msg);
    }
}