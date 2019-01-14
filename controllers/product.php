<?php
class Product extends Controller 
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function get($msg=false)
    {
        $this->view->products = $this->repository->getAll();
        
        include 'repository/subcategory_repository.php';
        $CateRepo = new Subcategory_Repository();
        $this->view->categories = $CateRepo->getSubcategoryOnCategories();

        $this->view->render('product');
    }

    public function add()
    {
        $msg = 0;
        $success = $this->repository->addProduct($_POST['ProductName'] ,$_POST['ProductPrice'] ,$_POST['ProductImageLink'] ,$_POST['ProductDescription'] ,$_POST['SubCategoryID']);
        if ($success){
            $msg = "record successfully added";
        } else{
            $msg = "failed to add record";
        }
        $this->get($msg);
    }

    public function detail($id)
    {
        $this->view->product = $this->repository->getProductById($id);
        include 'repository/subcategory_repository.php';
        $CateRepo = new Subcategory_Repository();
        $this->view->categories = $CateRepo->getSubcategoryOnCategories();

        $this->view->render('productDetail');
    }

    public function edit($id)
    {
        $msg = 0;
        $success = $this->repository->editProductMyID($id,$_POST['ProductName'] ,$_POST['ProductPrice'] ,$_POST['ProductImageLink'] ,$_POST['ProductDescription'] ,$_POST['SubCategoryID']);
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
