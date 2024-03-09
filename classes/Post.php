<?php

require_once 'BD.php';

class Post{

    private $id;
    private $autor;
    private $texto;
    private $imagen;
    private $num_likes;
    private $tags;
    private $fecha_publicacion;
    private $post_origen;

    private function __construct($user, $text, $img, $tags, $origen, $date){
        
        $this->id = null;
        $this->autor = $user;
        $this->texto = $text;
        $this->imagen = $img;
        $this->num_likes = 0;
        $this->tags = $tags;
        $this->fecha_publicacion = $date;
        $this->post_origen = $origen;
    }

    public static function crearPost($user_id, $text, $img, $tags, $father_post, $date){

        $p = new Post($user_id, $text, $img, $tags, $father_post, $date);
        return $p;
    }

    public static function obtenerRespuestas($post_id){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P WHERE P.origen IS $post_id ORDER BY P.fecha DESC";
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_user'], $fila['texto'], $fila['imagen'], $fila['tags'], $fila['origen'], $fila['fecha']);
        }
        $rs->free();
        
        return $result;
    }

    public static function buscarPostPorUsuario($user){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P JOIN usuario U ON P.id_user = U.id_user WHERE U.username = $user";
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_user'], $fila['texto'], $fila['imagen'], $fila['tags'], $fila['origen'], $fila['fecha']);
        }
        $rs->free();

        return $result;
    }

    //Devuelve el tiempo transcurrido desde que se publicó el post hasta ahora
    public static function tiempoTranscurrido(){
        //Ejemplo: han pasado 10 segundos: Hace 10 seg
        //Ejemplo: han pasado 2 minutos y 10 segundos: Hace 2 min
        //Ejemplo: han pasado 5 horas y 10 minutos: Hace 5 horas
        //Ejemplo: han pasado 7 dias y 10 horas: Hace 7 dias
    }

    private function buscarPostPorID($id){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P WHERE P.id_post IS $id";
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_user'], $fila['texto'], $fila['imagen'], $fila['tags'], $fila['origen'], $fila['fecha']);
        }
        $rs->free();

        return $result;
    }

    public static function getExamplePosts(){
        
    }

    public function generatePostHTML(){

        $user_info =<<<EOS
        @$this->autor <br>
        EOS;

        $post_info =<<<EOS2
        $this->texto
        EOS2;

        $html = "$user_info" . "$post_info";
        return $html;
    }

    // Setters
    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function getImagen(){
        return $this->imagen;
    }
    
    public function getLikes(){
        return $this->num_likes;
    }

    public function getTags(){
        return $this->tags;
    }

    public function getFecha(){
        return $this->fecha_publicacion;
    }

    public function getPadre(){
        return $this->post_origen;
    }
    
}