<?php
include 'models/order_model.php';

class Order_Repository extends Repository
{
    public function __construct(){
        parent::__construct();
    }

    public function get()
    {
        $statement = $this->db->prepare("SELECT * FROM Delivery");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Delivery_Model');
        return $data;
    }

    public function getFromUser($UserID)
    {
        $statement = $this->db->prepare("SELECT * FROM Delivery
        WHERE UserID = :UserID");
        $statement->execute(array(
            ':UserID' => $UserID,
        ));

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Delivery_Model');
        return $data;
    }

    public function getAllOrderDetail()
    {
        $statement = $this->db->prepare("SELECT * FROM Delivery
        LEFT JOIN OrderDetails ON Delivery.DeliveryID = OrderDetails.OrderID");
        $statement->execute(array(
        ));

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'OrderDetails_Model');
        return $data;
    }

    public function getAllOrderDetailFromUser($UserID)
    {
        $statement = $this->db->prepare("SELECT * FROM Delivery
        LEFT JOIN OrderDetails ON Delivery.DeliveryID = OrderDetails.OrderID
        WHERE UserID = :UserID");
        $statement->execute(array(
            ':UserID' => $UserID,
        ));

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'OrderDetails_Model');
        return $data;
    }

    public function getOrderDetail($OrderID)
    {
        $statement = $this->db->prepare("SELECT * FROM Delivery
        LEFT JOIN OrderDetails ON Delivery.DeliveryID = OrderDetails.OrderID
        WHERE DeliveryID = :OrderID");
        $statement->execute(array(
            ':OrderID' => $OrderID,
        ));

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'OrderDetails_Model');
        return $data;
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

    

    public function delete($OrderID)
    {
        $deleted = 0;

        $statement = $this->db->prepare("DELETE FROM OrderDetails
        WHERE OrderID = :OrderID;");
        $statement->execute(array(
            ':OrderID' => $OrderID,
        ));
        $rowcount = $statement->rowCount();
        if ($rowcount > 0)
        {
            return $deleted++;
        }

        $statement2 = $this->db->prepare("DELETE FROM Delivery
        WHERE DeliveryID = :OrderID;");
        $statement2->execute(array(
            ':OrderID' => $OrderID,
        ));
        $rowcount = $statement2->rowCount();
        if ($rowcount2 > 0)
        {
            return $deleted++;
        }

        if ($deleted > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }
}