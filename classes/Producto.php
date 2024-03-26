<?php

require_once 'BD.php';

class Producto{

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $autor;
    private $stock;
    private $precio;


    private function __construct($id, $nombre, $descripcion, $imagen, $autor, $stock, $precio){
        
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->autor = $autor;
        $this->stock = $stock;
        $this->precio = $precio;
     
    }

    public static function crearProducto($id, $nombre, $descripcion, $imagen, $autor, $stock, $precio){
        return new Producto($id, $nombre, $descripcion, $imagen, $autor, $stock, $precio);
    }
    

    public static function obtenerProductosDeArtista($username){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = sprintf( "SELECT * FROM producto P WHERE P.autor = '%s'", $username);
        $rs = $conection->query($query);
        
        while($fila = $rs->fetch_assoc()){
            $result[] = self::crearProducto($fila['id'],$fila['nombre'], $fila['descripcion'], 
                                            $fila['imagen'], $fila['autor'], $fila['stock'], $fila['precio']);
        }
        $rs->free();

        return $result;
    }

    public static function obtenerListaDeProductos($origen_aux = 'NULL'){

    }

    /*
    public static function buscarPostPorUsuario($user){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM post P JOIN usuario U ON P.id_user = U.id_user WHERE U.id_user = '%s';", $user); 
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_post'],$fila['id_user'], $fila['texto'], $fila['imagen'], $fila['likes'], $fila['origen'],$fila['tags'],  $fila['fecha']);
        }
        $rs->free();

        return $result;
    }
    */

    public static function buscarPostPorID($id){

        $conection = BD::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM producto P WHERE P.id = %d",  $id);
        $rs = $conection->query($query);
       
        while($fila = $rs->fetch_assoc()){
            $result = self::crearProducto($fila['id'], $fila['nombre'], $fila['descripcion'], 
                                          $fila['imagen'], $fila['autor'], $fila['stock'], $fila['precio']);
        }
        $rs->free();

        return $result;
    }

    public static function borrarProducto($producto){

        $result = false;
        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "DELETE FROM producto WHERE id = %d", $producto->id,
        );
        echo $query;

        $result = $conn->query($query);

        if (!$result)  
            error_log($conn->error);

        return $result;
    }

    private static function inserta($producto){

        $result = false;
        $conn = BD::getInstance()->getConexionBd();

        $id, $nombre, $descripcion, $imagen, $autor, $stock, $precio

        $query = sprintf(
            "INSERT INTO producto (id, nombre, descripcion, imagen, autor, stock, precio)
                       VALUES ('%d','%s','%s', %s, %s, '%d', '%d')",
            $producto->id,
            $conn->real_escape_string($producto->nombre),
            $conn->real_escape_string($producto->descripcion),
            is_null($producto->imagen) ? 'NULL' : $conn->real_escape_string($producto->imagen),
            $conn->real_escape_string($producto->autor),
            $producto->stock,
            $producto->precio,
        );

        $result = $conn->query($query);

        if ($result) {
            $producto->id = $conn->insert_id;
            $result = $producto;
        }
        else 
            error_log($conn->error);

        return $result;
    }

    public static function actualizar($producto){
        $result = false;
        $conn = BD::getInstance()->getConexionBd();
    
        $query = sprintf(
            "UPDATE producto SET nombre = '%s', imagen = '%s', likes = %d, tags = '%s', fecha = '%s' WHERE id = %d",
            $conn->real_escape_string($producto->texto),
            $conn->real_escape_string($producto->imagen),
            $post->num_likes,
            $conn->real_escape_string($post->tags), 
            Post::generatePostDate(),
            $post->id
        );
    
        $result = $conn->query($query);
    
        if (!$result) 
            error_log($conn->error);
        else if ($conn->affected_rows != 1) 
            error_log("Se han actualizado '$conn->affected_rows' registros!");
    
        return $result;
    }

    public function guarda(){

        if (!$this->id) 
            self::inserta($this);
        else 
            self::actualiza($this);

        return $this;
    }

    public function guardaFav(){
        !$this->id ? self::insertaFav($this, $this->id) : self::actualiza($this);
        return $this;
    }

    public function aumentaLikes($num){
        $this->num_likes +=  $num;
    }


    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function setLikes($num) {
        $this->num_likes = $num;
    }

    public function getId(){
        return $this->id;
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
