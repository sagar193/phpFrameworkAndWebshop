<?php
include 'models/menu_model.php';

class Menu_Repository extends Repository
{
    public function __construct(){
        parent::__construct();
    }

    public function getAllMenus()
    {
        $statement = $this->db->prepare("SELECT * FROM Menu;");
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, 'Menu_Model');
        return $data;
    }

    public function addMenu($MenuName, $MenuLink)
    {
        $statement = $this->db->prepare("INSERT INTO Menu 
        (MenuID, MenuName, MenuLink) 
        VALUES (NULL, :MenuName, :MenuLink)");

        $statement->execute(array(
            ':MenuName' =>$MenuName,
            ':MenuLink' => $MenuLink,
        ));
        if ( $statement->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getMenuById($MenuID)
    {
        $statement = $this->db->prepare("SELECT * FROM Menu WHERE
         MenuID = :MenuID;");
         $statement->execute(array(
             ':MenuID' => $MenuID,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Menu_Model');
         $data = $statement->fetch();
         return $data;
    }

    public function editMenuByID($MenuID, $MenuName, $MenuLink)
    {
        $statement = $this->db->prepare("UPDATE Menu
        SET MenuName = :MenuName, MenuLink = :MenuLink
         WHERE MenuID = :MenuID;");

         $statement->execute(array(
             ':MenuID' => $MenuID,
             ':MenuName' => $MenuName,
             ':MenuLink' => $MenuLink
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Menu_Model');
         if ( $statement->rowCount() > 0)
         {
             return true;
         } else {
             return false;
         }
    }

    public function delete($MenuID)
    {
        $statement = $this->db->prepare("DELETE FROM Menu WHERE
         MenuID = :MenuID;");
         $statement->execute(array(
             ':MenuID' => $MenuID,
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
}