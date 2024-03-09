<?php

require_once 'BD.php';

class Usuario{

    private $username;
    private $email;
    private $nickname;
    private $password;
    private $birthdate;
    private $isArtist;
    
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
        $query = "INSERT INTO `usuario` (`id_user`, `email`, `username`, `nickname`, `password`, `foto`, `descripcion`, `karma`, `num_seguidores`, `num_seguidos`) VALUES ";
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

<?php

require_once 'BD.php';

class Usuario{

    private $username;
    private $nickname;
    private $password;
    private $birthdate;
    private $isArtist;
    
    function __construct($user, $name, $pass, $birth, $artist){
        
        $this->username = $user;
        $this->nickname = $name;
        $this->password = $pass;
        $this->birthdate = $birth;
        $this->isArtist = $artist;
    }
    public static function login ($username, $password) {
        $usuario= self:: buscaUsuario($username); 
        
        if($usuario && $usuario->comprueba_password($password)){ //El login es correcto 
            return $usuario; 
        }

        return false; 
    }
    public static function createUser($username, $nickname, $password, $birth, $artist){

        $conection = BD::getInstance()->getConexionBd();
        $nullv = null;
        $karma = 0;
        $seguid = 0;
        $query = "INSERT INTO `usuario` (`id_user`, `username`, `nickname`, `password`, `foto`, `descripcion`, `karma`, `num_seguidores`, `num_seguidos`) VALUES ";
        $values = "($nullv, $username, $nickname, $password, $nullv, $nullv, $karma, $seguid, $seguid)";
        $query .= $values;
        $conection->query($query);
    }


    public static function buscaUsuario($username){
        $conn= BD:: getInstance()->getConexionBd();
        $query= sprintf("SELECT * FROM usuario U WHERE U.username= '%s'", $conn->real_escape_string($username)); 
        $rs= $conn->query($query); 
        $result= false; 

        if($rs) {
            $fila= $rs->fetch_assoc(); 
            if($fila) {
                //Comprobar si el usuario es artista 
                $artista= self::esArtista($fila['id_user']); 

                $result= new Usuario($fila['username'], $fila['nickname'], $fila['password'], NULL, $artista);
            
            }
            $rs->free(); 

        }
        else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }

        return $result; 
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
