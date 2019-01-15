<?php

class Cart extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        if(isset($_COOKIE["CART"]))
        {
            include 'repository/product_repository.php';
            $ProductRepo = new Product_Repository();
            $this->view->products = $ProductRepo->getMultipleProductsById(unserialize($_COOKIE["CART"], ["allowed_classes" => false]));
            
            $this->totalprice = 0.0;
            foreach ($this->view->products as &$product) {
                $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
                foreach ($cart as $obj) {
                    if ($product->ProductID == $obj[0])
                    {
                        $product->Amount = $obj[1];
                        $this->totalprice = ($product->ProductPrice * $product->Amount)+$this->totalprice;
                    }
                }
            }
            $this->view->CartTotalPrice = $this->totalprice;
        }
        $this->renderController('cart');
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

        header('Location: '.ROOTURL.'product');
    }

    public function remove($id)
    {
        $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
            $found = false;
            foreach ($cart as $key => &$obj) {
                if($obj[0] === $id)
                {
                    $found = true;
                    print_r($cart);
                    $newValue = (int)$obj[1];
                    $newValue--;
                    if ($newValue === 0){
                        unset($cart[$key]);
                    } else{
                        $obj[1] = $newValue;
                    }
                }
            }
            if ($found == false){
                array_push($cart, 
                array($id, (int)1));
            }
        setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        header('Location: '.ROOTURL.'product');

    }

    public function delete($id)
    {
        $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
        $found = false;
        print_r($cart);
        foreach ($cart as $key => $obj) {
            if($obj[0] === $id)
            {
                unset($cart[$key]);
            }
        }
        echo "<br/>";
        print_r($cart);
        setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        header('Location: '.ROOTURL.'product');
    }



}
