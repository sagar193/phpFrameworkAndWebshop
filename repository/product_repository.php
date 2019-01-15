<?php
include 'models/product_model.php';

class Product_Repository extends Repository
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $statement = $this->db->prepare("SELECT * FROM Products;");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Product_Model');
        return $data;
    }

    public function addProduct($ProductName, $ProductPrice, $ProductImageLink, $ProductDescription, $SubCategoryID)
    {
        $statement = $this->db->prepare("INSERT INTO Products 
        (ProductID, ProductName, ProductPrice, ProductImageLink, 
        ProductDescription, SubCategoryID) 
        VALUES (NULL, :ProductName, :ProductPrice, :ProductImageLink, 
        :ProductDescription, :SubCategoryID);");
        
        $statement->execute(array(
            ':ProductName' => $ProductName,
            ':ProductPrice' => $ProductPrice,
            ':ProductImageLink' => $ProductImageLink,
            ':ProductDescription' => $ProductDescription,
            ':SubCategoryID' => $SubCategoryID
        ));
        if ( $statement->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getProductById(int $ProductID)
    {
        $statement = $this->db->prepare("SELECT * FROM Products 
        LEFT JOIN subcategorie on Products.SubCategoryID = subcategorie.SubCategoryID 
        LEFT JOIN Categorie on subcategorie.CategoryID = Categorie.CategoryID
        WHERE ProductID = :ProductID ;"
         );
         $statement->execute(array(
             ':ProductID' => $ProductID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetch();
         return $data;
    }

    public function editProductMyID($ProductID, $ProductName, $ProductPrice, $ProductImageLink, $ProductDescription, $SubCategoryID)
    {
        $statement = $this->db->prepare("UPDATE Products
        SET ProductName = :ProductName,
        ProductPrice = :ProductPrice,
        ProductImageLink =:ProductImageLink,
        ProductDescription = :ProductDescription,
        SubCategoryID = :SubCategoryID
         WHERE ProductID = :ProductID;");

         $statement->execute(array(
             ':ProductID' => $ProductID,
             ':ProductName' => $ProductName,
             ':ProductPrice' => $ProductPrice,
             ':ProductImageLink' => $ProductImageLink,
             ':ProductDescription' => $ProductDescription,
             ':SubCategoryID' => $SubCategoryID
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         if ( $statement->rowCount() > 0)
         {
             return true;
         } else {
             return false;
         }
    }

    public function delete($ProductID)
    {
        $statement = $this->db->prepare("DELETE FROM Products WHERE
         ProductID = :ProductID;");
         $statement->execute(array(
             ':ProductID' => $ProductID,
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

    public function getMultipleProductsById($ProductIDs)
    {
        $c = 0;
        $productIDstring = " ";
        foreach ($ProductIDs as &$productArray) {
            if ($c > 0){
                $productIDstring = $productIDstring." OR ";
            }

            $productIDstring = $productIDstring."" .$productArray[0];
            $c++;
        }

        $statement = $this->db->prepare("SELECT * FROM Products WHERE
         ProductID = $productIDstring"
         );
         $statement->execute();
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetchAll();

         return $data;
    }

    public function search($string)
    {
        $statement = $this->db->prepare("SELECT * FROM Products 
        WHERE ProductImageLink LIKE '%$string%' OR ProductName LIKE '%$string%' OR ProductDescription LIKE '%$string%';"
         );
         $statement->execute(array());
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetchAll();
         return $data;
    }

    public function getByCategory($CategoryID)
    {
        $statement = $this->db->prepare("SELECT * FROM Categorie
        RIGHT JOIN subcategorie ON Categorie.CategoryID = subcategorie.CategoryID 
        RIGHT JOIN Products on subcategorie.SubCategoryID = Products.SubCategoryID 
        WHERE Categorie.CategoryID = :CategoryID"
         );
         $statement->execute(array(
             ':CategoryID' => $CategoryID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetchAll();
         return $data;
    }

    public function getBySubCategory($CategoryID)
    {
        $statement = $this->db->prepare("SELECT * FROM subcategorie
        RIGHT JOIN Products on subcategorie.SubCategoryID = Products.SubCategoryID 
        WHERE subcategorie.SubCategoryID = :CategoryID"
         );
         $statement->execute(array(
             ':CategoryID' => $CategoryID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetchAll();
         return $data;
    }
}
?>