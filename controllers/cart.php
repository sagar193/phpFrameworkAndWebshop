<?php

class Cart extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        include 'repository/product_repository.php';
        $ProductRepo = new Product_Repository();
        $this->view->products = $ProductRepo->getMultipleProductsById(unserialize($_COOKIE["CART"], ["allowed_classes" => false]));
        
        foreach ($this->view->products as &$product) {
            $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
            foreach ($cart as $obj) {
                if ($product->ProductID == $obj[0])
                $product->Amount = $obj[1];
            }
        }
        var_dump($this->view->products);
        
        return;
        $this->view->render('cart');
    }

    public function add($id)
    {
        if(isset($_COOKIE["CART"])){
            $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
            $found = false;
            foreach ($cart as &$obj) {
                if($obj[0] === $id)
                {
                    $found = true;
                    print_r($cart);
                    $newValue = (int)$obj[1];
                    $newValue++;
                    $obj[1] = $newValue;
                }
            }
            if ($found == false){
                array_push($cart, 
                array($id, (int)1));
            }
            setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        }
        else{
            $cart = array(
            array($id, (int)1)
        );
            setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        }
        //print_r( unserialize($_COOKIE["CART"], ["allowed_classes" => false]));

        //header('Location: '.ROOTURL.'product');
    }



}