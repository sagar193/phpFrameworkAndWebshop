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
        
        include 'repository/subcategory_repository.php';
        $CateRepo = new Subcategory_Repository();
        $this->view->categories = $CateRepo->getSubcategoryOnCategories();

        $this->view->render('cart');
        $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
        foreach ($cart as $obj) {
            echo "amount: ".$obj[1]."<br/>";
        }
    }

    public function add($id)
    {
        if(isset($_COOKIE["CART"])){
            $cart = unserialize($_COOKIE["CART"], ["allowed_classes" => false]);
            $found = false;
            foreach ($cart as &$obj) {
                if($obj[0] == $id)
                {
                    $found = true;
                    $newValue = (int)$obj[1];
                    $newValue++;
                    $obj[1] = $newValue;
                }
            }
            if ($found == false){
                array_push($cart, $id, (int)1);
            }
            setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        }
        else{
            $cart = array(
            array($id, (int)1)
        );
            setcookie("CART", serialize($cart), time() + (86400 * 30), "/");
        }

        //header('Location: '.ROOTURL.'product');
    }



}
