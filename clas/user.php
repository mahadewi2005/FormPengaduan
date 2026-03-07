<?php

class User {

    protected $username;
    protected $password;

    public function setLogin($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

}