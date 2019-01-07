<?php
require 'models/user.php';

class Login_Repository extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByName($username)
    {
        $statement = $this->db->prepare("SELECT * FROM users WHERE
         username = :username;");
         $statement->execute(array(
             ':username' => $username,
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
         $data = $statement->fetch();
         return $data;
    }

    public function addUser($email, $username, $password){
        $statement = $this->db->prepare("INSERT INTO users (id, email, username, password) VALUES (NULL, :emailAddress ,:login, :password)");
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        
        $reu = $statement->execute(array(
            ':emailAddress' =>$email,
            ':login' => $username,
            ':password' => $hashedPassword
        ));
        if ( $statement->rowCount() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function getAllUsers()
    {
        $statement = $this->db->prepare("SELECT * FROM users;");
        $statement->execute();

        $data  = $statement->fetchAll();
        print_r($data);
    }

}