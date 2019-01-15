<?php

class Subcategory extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($msg = false)
    {
        $this->view->subcategory = $this->repository->getAllSubcategories();

        include 'repository/category_repository.php';
        $CateRepo = new Category_Repository();
        $this->view->category = $CateRepo->getAllCategories();

        $this->renderController('subcategory');
    }

    public function add()
    {
        $msg = 0;
        $success = $this->repository->addSubcategory($_POST['SubCategoryName'] ,$_POST['CategoryID']);
        if ($success){
            $msg = "record successfully added";
        } else{
            $msg = "failed to add record";
        }
        $this->get($msg);
    }

    public function detail($id)
    {
        $this->view->subcategory = $this->repository->getSubcategoryById($id);
        
        include 'repository/category_repository.php';
        $CateRepo = new Category_Repository();
        $this->view->category = $CateRepo->getAllCategories();

        $this->renderController('subcategoryDetail');
    }

    public function edit($id)
    {
        $msg = 0;
        $success = $this->repository->editSubcategoryNameByID($id,$_POST['SubCategoryName'] ,$_POST['CategoryID']);
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