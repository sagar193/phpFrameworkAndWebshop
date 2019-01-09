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

    public function editCategoryNameByID($CategoryID, $categoryName)
    {
        $statement = $this->db->prepare("UPDATE Categorie SET CategoryName = :CategoryName
         WHERE CategoryID = :CategoryID;");

         $statement->execute(array(
             ':CategoryID' => $CategoryID,
             ':CategoryName' => $categoryName
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Category_Model');
         if ( $statement->rowCount() > 0)
         {
             return true;
         } else {
             return false;
         }
    }

    public function getCategoryByID($CategoryID)
    {
        $statement = $this->db->prepare("SELECT * FROM Categorie WHERE
         CategoryID = :CategoryID;");
         $statement->execute(array(
             ':CategoryID' => $CategoryID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Category_Model');
         $data = $statement->fetch();
         return $data;
    }

    public function delete($CategoryID)
    {
        $statement = $this->db->prepare("DELETE FROM Categorie WHERE
         CategoryID = :CategoryID;");
         $statement->execute(array(
             ':CategoryID' => $CategoryID,
         ));
         $rowcount = $statement->rowCount();
         if ($rowcount > 0)
         {
             return true;
         }
         else 
         {
             return false;
         }
    }

    //INSERT INTO `Categorie` (`CategoryID`, `CategoryName`) VALUES (NULL, 'Films');
}