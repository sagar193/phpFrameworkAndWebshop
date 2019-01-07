<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $admin;

    
    public function checkPassword($enteredPassword){
        $result = password_verify($enteredPassword, $this->password);
        if($result){
            return true;
        } else {
            return false;
        }
    }

}