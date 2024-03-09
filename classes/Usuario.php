<?php

require_once 'BD.php';

class Usuario{

    private $username;
    private $nickname; 
    private $password;
    private $fotopath;
    private $desc;
    private $karma;
    private $isArtist;
    private $birthdate;
    private $email;
 
    
    function __construct($user, $email, $name, $pass, $birth, $artist){
        
        $this->username = $user;
        $this->email = $email;
        $this->nickname = $name;
        $this->password = $pass;
        $this->birthdate = $birth;
        $this->isArtist = $artist;
    }


    /*

        Registra un nuevo usuario en la Base de Datos 


    */


    public static function createUser($username, $email, $nickname, $password, $birth, $artist){

        /*Primero compruebo si ya existe un usuario con el mismo username*/ 
        $user_buscado= self:: buscaUsuario($username);

        if($user_buscado){ //Ya existia un usuario con ese nombre 
            /* TODO
                Mostrar error 
                ¿Usar lo de redirigir? 
            */
        }
        else {
            $conection = BD::getInstance()->getConexionBd();
            $nullv = null;
            $karma = 0;
            $query = "INSERT INTO usuario (id_user, nickname, password, foto, descripcion, karma, fecha, correo) VALUES ";
            $values = "('$username', '$nickname', '$password', '$nullv', '$nullv', $karma, '$birth', '$email'); ";
            $query .= $values;
            $conection->query($query);

            $result= false; 

            if($conection) {
                if($artist) {
                    $query= "INSERT INTO artista (id_artista, integrantes) VALUES "; 
                    $values= "('$id_user', '$nullv'); "; 
                    $query .= $values; 
    
                    $conection->query($query); 
    
                   if($conection) {
                    }
    
                    else {
                        error_log("Error BD ({$conn->errno}): {$conn->error}");
                    }

                }   
                new Usuario($username, $email, $nickname, $password, $birth, $artist); 
            }
            else {
                error_log("Error BD ({$conn->errno}): {$conn->error}");
            }

        }
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

    public static function login ($username, $password) {
        $usuario= self:: buscaUsuario($username); 
        
        if($usuario && $usuario->comprueba_password($password)){ //El login es correcto 
            return $usuario; 
        }

        return false; 
    }

 

    public static function buscaUsuario($username){
        $conn= BD:: getInstance()->getConexionBd();
        $query= sprintf("SELECT * FROM usuario U WHERE U.nickname= '%s'", $conn->real_escape_string($username)); 
        $rs= $conn->query($query); 
        $result= false; 

        if($rs) {
            $fila= $rs->fetch_assoc(); 
            if($fila) {
                //Comprobar si el usuario es artista 
                $artista= self::esArtista($fila['id_user']); 

                $result= new Usuario($fila['nickname'], NULL, $fila['password'], NULL, $artista);
            
            }
            $rs->free(); 

        }
        else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }

        return $result; 
    }


    
    public function comprueba_password(){

        return password_verify($password, $this->password); 
    }

    public function esArtista($id_u) {

        $conn= BD:: getInstance()->getConexionBd();
        $query= sprintf("SELECT * FROM artista A WHERE A.id_artista= '%s'", $conn->real_escape_string($id_u)); 
        $rs= $conn->query($query); 
        $result= false; 

        if($rs) {
            $fila= $rs->fetch_assoc(); 

            if($fila) {

                return 'Si'; 
            }
            else return 'No'; 
        }
        else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
    }
}

