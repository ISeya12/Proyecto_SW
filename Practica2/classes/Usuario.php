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


}