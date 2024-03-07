<?php

class Usuario{

    private $username;
    private $nickname;
    private $password;
    
    function __construct(string $user, string $name, string $pass){
        
        $this->username = $user;
        $this->nickname = $name;
        $this->password = $pass;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getPassword()
    {
        return $this->password;
    }
}