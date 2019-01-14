<?php

class Delivery_Model
{
    public $DeliveryID;
    public $UserID;
}

class OrderDetails_Model
{	
    public $DeliveryID;
    public $UserID;
    public $OrderID;
    public $ProductID;
    public $Amount;
}