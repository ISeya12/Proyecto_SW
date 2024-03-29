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
        $query = sprintf( "SELECT * FROM producto P WHERE P.id_artista = '%s'", $username);
        $rs = $conection->query($query);
        
        while($fila = $rs->fetch_assoc()){
            $result[] = self::crearProducto($fila['id_prod'],$fila['nombre'], $fila['descripcion'], 
                                            $fila['imagen'], $fila['id_artista'], $fila['stock'], $fila['precio']);
        }
        $rs->free();

        return $result;
    }

    public static function obtenerListaDeProductos($origen_aux = 'NULL'){

    }

    public static function buscarProductoPorID($id){

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
            "UPDATE producto SET nombre = '%s', descripcion = '%s', imagen = '%s', stock = '%d', precio = '%d' WHERE id = %d",
            $conn->real_escape_string($producto->nombre),
            $conn->real_escape_string($producto->descripcion),
            $conn->real_escape_string($producto->imagen),
            $producto->stock,
            $producto->$precio,
            $producto->id
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
    

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getAutor(){
        return $this->autor;
    }
    
    public function getStock(){
        return $this->stock;
    }

    public function getPrecio(){
        return $this->precio;
    }
}
