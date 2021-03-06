<?php

class User
{
    public $id;
    public $username;
    private $password_hash;

    //Dont want password in here, will be seperate function
    public function __construct($username, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }
        $this->username = $username;
    }

    //Create a function that hashes our entered password for a User
    public function hash_password($password)
    {
        //password_hash is built in function, 2nd arg is how secure, and null is highest security
        $this->password_hash = password_hash($password, null);
    }

    //returns the hashed password, will be used in function to create a new User (DB.php)
    public function get_password_hash()
    {
        return $this->password_hash;
    }

    //will be used in login function to set the hashed password to whats in the DB
    public function set_password_hash($password_hash)
    {
        $this->password_hash = $password_hash;
    }

    public function test_password($password)
    {
        //will return true/false
        $correct = password_verify($password, $this->password_hash);

        return $correct;
    }
}
