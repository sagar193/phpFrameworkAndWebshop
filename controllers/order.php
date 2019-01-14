<?php

class Order extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {

        $this->view->render('order');
    }

    public function add()
    {
        $msg = 0;
        if (!Session::get('id'))
        {
            $msg = "Unable to order when not logged in, please log in";
            $this->view->render('product');
            exit();
        }
        $success = $this->repository->addOrder(Session::get('id'), unserialize($_COOKIE["CART"], ["allowed_classes" => false]));
        if ($success){
            $msg = "Successfully orderd";
        } else{
            $msg = "Order was not able to process";
        }
        unset($_COOKIE[$CART]);
        setcookie($CART, '', time() - 3600);

        $this->view->render('home');
    }

    public function detail($id)
    {
        $success = $this->repository->getOrderDetail($id);
        var_dump($success);
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
