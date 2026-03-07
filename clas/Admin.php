<?php

require_once 'User.php';

class Admin extends User {

    public function login($conn){

        $sql = "SELECT * FROM admin 
                WHERE username='$this->username' 
                AND password='$this->password'";

        $result = $conn->query($sql);

        return $result->num_rows > 0;

    }

}