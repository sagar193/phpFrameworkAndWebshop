<?php

class Menu extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($msg = false)
    {
        $this->view->menu = $this->repository->getAllMenus();

        if($msg)
        {
            $this->view->msg = $msg;
        }
        $this->view->render('menu');
    }

    public function add()
    {
        $msg = 0;
        $success = $this->repository->addMenu($_POST['MenuName'] ,$_POST['MenuLink']);
        if ($success){
            $msg = "record successfully added";
        } else{
            $msg = "failed to add record";
        }
        $this->get($msg);
    }

    public function detail($id)
    {
        $this->view->menu = $this->repository->getMenuById($id);

        $this->view->render('menuDetail');
    }

    public function edit($id)
    {
        $msg = 0;
        $success = $this->repository->editMenuByID($id,$_POST['MenuName'] ,$_POST['MenuLink']);
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