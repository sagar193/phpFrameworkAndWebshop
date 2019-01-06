<?php

class Login_Model extends Model
{
    public $username;
    public $password;
    public $email;

    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {

    }

    public function checkPassword($enteredPassword){
        $result = password_verify($enteredPassword, $this->password);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        
        $statement = $this->db->prepare("SELECT * FROM users WHERE
         username = :username;");
         $statement->execute(array(
             ':username' => $_POST['username'],
         ));
         $statement->setFetchMode(PDO::FETCH_CLASS, 'Login_Model');
         $data = $statement->fetch();
         if (!$data){
             echo "username not found";
             return false;
         }
         $same = $data->checkPassword($_POST['password']);
         if ($same){
             echo "same password";
         } else {
             echo "wrong password";
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
            echo "success";
        } else {
            echo "rail";
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