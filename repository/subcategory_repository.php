<?php
include 'models/subcategory_model.php';

class Subcategory_Repository extends Repository
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllSubcategories()
    {
        $statement = $this->db->prepare("SELECT * FROM subcategorie;");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Subcategory_Model');
        return $data;
    }

    public function addSubcategory($subcategoryName, $CategoryID)
    {
        $statement = $this->db->prepare("INSERT INTO subcategorie 
        (SubCategoryID, CategoryID, SubCategoryName) 
        VALUES (NULL, :CategoryID, :SubcategoryName)");
        
        $statement->execute(array(
            ':CategoryID' =>$CategoryID,
            ':SubcategoryName' => $subcategoryName
        ));
        if ( $statement->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getSubcategoryById($SubCategoryID)
    {
        $statement = $this->db->prepare("SELECT * FROM subcategorie WHERE
         SubCategoryID = :SubCategoryID;");
         $statement->execute(array(
             ':SubCategoryID' => $SubCategoryID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Subcategory_Model');
         $data = $statement->fetch();
         return $data;
    }

    public function editSubcategoryNameByID($SubCategoryID, $SubCategoryName, $CategoryID)
    {
        $statement = $this->db->prepare("UPDATE subcategorie
        SET CategoryID = :CategoryID,
         SubCategoryName = :SubCategoryName
         WHERE SubCategoryID = :SubCategoryID;");

         $statement->execute(array(
             ':CategoryID' => $CategoryID,
             ':SubCategoryID' => $SubCategoryID,
             ':SubCategoryName' => $SubCategoryName
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Subcategory_Model');
         $data = $statement->fetch();
         return $data;
    }

    public function delete($SubCategoryID)
    {
        $statement = $this->db->prepare("DELETE FROM subcategorie WHERE
         SubCategoryID = :SubCategoryID;");
         $statement->execute(array(
             ':SubCategoryID' => $SubCategoryID,
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

    public function getSubcategoryOnCategories()
    {
        $statement = $this->db->prepare("SELECT * FROM subcategorie 
        LEFT JOIN Categorie on subcategorie.CategoryID = Categorie.CategoryID;");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Subcategory_Model');
        return $data;
    }
}