<?php
include 'models/order_model.php';

class Order_Repository extends Repository
{
    public function __construct(){
        parent::__construct();
    }

    public function addOrder($UserID, $cart)
    {
        $statement = $this->db->prepare("INSERT INTO Delivery 
        (DeliveryID, UserID)
        VALUES (NULL, :UserID)");

        $statement->execute(array(
            ':UserID' => $UserID,
        ));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Delivery_Model');
        $newOrderID = $this->db->lastInsertId();
        
        $amountOfProducts = 0;
        foreach ($cart as $obj) {
            $statement2 = $this->db->prepare("INSERT INTO OrderDetails
            (OrderID, ProductID, Amount)
            VALUES (:OrderID, :ProductID, :Amount)");

            $statement2->execute(array(
                ':OrderID' => $newOrderID,
                ':ProductID' => $obj[0],
                ':Amount' => $obj[1]
            ));
            if ( $statement->rowCount() > 0)
            {
                $amountOfProducts++;
            }
        }
        if ($amountOfProducts > 0)
        { 
            return true;
        }
        else return false;
    }
}