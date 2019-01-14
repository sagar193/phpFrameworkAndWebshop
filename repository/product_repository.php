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
        $statement = $this->db->prepare("SELECT * FROM Products WHERE
         ProductID = :ProductID 
         LEFT JOIN subcategorie on Products.SubCategoryID = subcategorie.SubCategoryID 
         LEFT JOIN Categorie on subcategorie.CategoryID = Categorie.CategoryID;" 
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
             ':ProductName' => $ProductPrice,
             ':ProductImageLink' => $ProductImageLink,
             ':ProductDescription' => $ProductDescription,
             ':SubCategoryID' => $SubCategoryID
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Subcategory_Model');
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

            $productIDstring = $productIDstring."" .$productArray[1];
            $c++;
        }

        echo $productIDstring;
        /// output should be     2 AND 3



        return;
        $statement = $this->db->prepare("SELECT * FROM Products WHERE
         ProductID = :ProductID 
         LEFT JOIN subcategorie on Products.SubCategoryID = subcategorie.SubCategoryID 
         LEFT JOIN Categorie on subcategorie.CategoryID = Categorie.CategoryID;" 
         );
         $statement->execute(array(
             ':ProductID' => $ProductID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Product_Model');
         $data = $statement->fetch();
         return $data;
    }
}
?>