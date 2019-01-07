<?php
include 'models/category_model.php';

class Category_Repository extends Repository
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllCategories()
    {
        $statement = $this->db->prepare("SELECT * FROM Categorie;");
        $statement->execute();

        $data  = $statement->fetchAll(PDO::FETCH_CLASS, 'Category_Model');
        return $data;
    }

    public function addCategory($categoryName)
    {
        $statement = $this->db->prepare("INSERT INTO Categorie 
        (CategoryID, CategoryName) 
        VALUES (NULL, :CategoryName)");
        
        $statement->execute(array(
            ':CategoryName' =>$categoryName
        ));
        if ( $statement->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getCategoryByName($categoryName)
    {
        $statement = $this->db->prepare("SELECT * FROM Categorie WHERE
         CategoryName = :CategoryName;");

         $statement->execute(array(
             ':CategoryName' => $categoryName,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Category_Model');
         $data = $statement->fetch();
         return $data;
    }

    //INSERT INTO `Categorie` (`CategoryID`, `CategoryName`) VALUES (NULL, 'Films');
}