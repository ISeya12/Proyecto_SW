<?php

require_once 'BD.php';

class Usuario{

    private $username;
    private $nickname; 
    private $password;
    private $birthdate;
    private $isArtist;
    private $email;
 
    
    function __construct($user, $email, $name, $pass, $birth, $artist){
        
        $this->username = $user;
        $this->email = $email;
        $this->nickname = $name;
        $this->password = $pass;
        $this->birthdate = $birth;
        $this->isArtist = $artist;
    }

    public static function createUser($username, $email, $nickname, $password, $birth, $artist){

        $conection = BD::getInstance()->getConexionBd();
        $nullv = null;
        $karma = 0;
        $seguid = 0;
        $query = "INSERT INTO `usuario` (`id_user`, `nickname`, `password`, `foto`, `descripcion`, `karma`, `correo`) VALUES ";
        $values = "($nullv, $email, $username, $nickname, $password, $nullv, $nullv, $karma, $seguid, $seguid)";
        $query .= $values;
        $conection->query($query);
    }

    public function getUsername(){
        return $this->username;
    }

    public function getNickname(){
        return $this->nickname;
    }

    public function getPassword(){
        return $this->password;
    }
}
