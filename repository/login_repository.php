<?php
require 'models/user.php';

class Login_Repository extends Model
{
    public $username;
    public $password;
    public $email;
    public $admin;

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $statement = $this->db->prepare("SELECT * FROM users WHERE
         username = :username;");
         $statement->execute(array(
             ':username' => $_POST['username'],
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'User');
         $data = $statement->fetch();
         if (!$data){
             $error = "username not found";
             return false;
         }
         $same = $data->checkPassword($_POST['password']);
         if ($same){
             echo "setting session";
            Session::set('loggedIn', true);
            Session::set('username', $data->username);
            Session::set('admin', $data->admin);
            return true;
         } else {
            $error = "wrong password";
             return false;
         }
         
    }

    public function register(){
        $statement = $this->db->prepare("INSERT INTO users (id, email, username, password) VALUES (NULL, :emailAddress ,:login, :password)");
        
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]);
        
        $statement->execute(array(
            ':emailAddress' =>$_POST['emailAddress'],
            ':login' => $_POST['username'],
            ':password' => $hashedPassword
        ));
        if ( $statement->rowCount() > 0)
        {
            Session::set('loggedIn', true);
            Session::set('username', $data->username);
            return true;
        } else {
            $error = "failed to create user";
            return false;
        }
    }

    public function getAll()
    {
        $statement = $this->db->prepare("SELECT * FROM users;");
        $statement->execute();

        $data  = $statement->fetchAll();
        print_r($data);
    }

}