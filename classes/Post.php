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

    private function __construct($id,$user, $text, $img, $likes, $tags, $origen, $date){
        $this->id = $id;
        $this->autor = $user;
        $this->texto = $text;
        $this->imagen = $img;
        $this->num_likes = $likes;
        $this->post_origen = $origen;
        $this->tags = $tags;
        $this->fecha_publicacion = $date;
     
    }

    public static function crearPost($user_id, $text, $img, $tags, $father_post, $date){
        return new Post($user_id, $text, $img, $tags, $father_post, $date);
    }

    public static function obtenerPostDeUsuario($id){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P WHERE P.origen IS $id ORDER BY P.fecha DESC";
        $rs = $conection->query($query);

        //
        //  OBTENER DATOS DE LA BD
        //

        return $result;
    }

    public static function obtenerListaDePosts($origen_aux = 'NULL'){
        $post = [];
        $conection = BD::getInstance()->getConexionBd();

        if($origen_aux == 'NULL')
            $operation = 'IS';
        else 
            $operation = '=';

        $query = "SELECT * FROM post P WHERE P.origen $operation $origen_aux ORDER BY P.fecha DESC";
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $post[] = new Post($fila['id_post'],$fila['id_user'], $fila['texto'], $fila['imagen'], $fila['likes'], $fila['origen'],$fila['tags'],  $fila['fecha']);
        }
        $rs->free();
        
        return $post;
    }

    public static function buscarPostPorUsuario($user){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P JOIN usuario U ON P.id_user = U.id_user WHERE U.id_user = $user";
        $rs = $conection->query($query);

        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_post'],$fila['id_user'], $fila['texto'], $fila['imagen'], $fila['likes'], $fila['origen'],$fila['tags'],  $fila['fecha']);
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

    public static function likeAsignado($id,$user){

        $result = true ;
        $conection = BD::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM postfav P WHERE P.id_post  = %d AND P.id_user  = '%s'",$id , $user);
        $rs = $conection->query($query);

        if($rs->num_rows == 0){
            $result = false;
        }   
        $rs->free();

        return $result;
    }

    public static function buscarPostFavPorUser($id){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM postfav P WHERE P.id_user = $id";
        $rs = $conection->query($query);

        return $result;
    }

    public static function buscarPostPorID($id){

        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P WHERE P.id_post = $id";
        $rs = $conection->query($query);
       
        while($fila = $rs->fetch_assoc()){
            $result = new Post($fila['id_post'],$fila['id_user'], $fila['texto'], $fila['imagen'], $fila['likes'], $fila['origen'],$fila['tags'],  $fila['fecha']);
        }
        $rs->free();
        
        return $result;
    }

    public function generatePostHTML(){

        //Imagen de usuario junto a su username
        $user_info =<<<EOS
        <div class="user_info">
            <img src="img/foto_perfil.png" width="50px" height="50px">
            <div style="display: inline-block; position: absolute; margin-top: 15px;"> @$this->autor </div>
        </div>
        EOS;

        //Texto del post
        $post_info =<<<EOS2
        <div class="post_info">
            <p>$this->texto </p> 
        </div>
        EOS2;

        $boton_like = <<<EOS
        <form action="ProcesarLike.php" method="post">
            <input type="hidden" name="likeId" value="$this->id">
            <button type="submit">$this->num_likes &#10084</button>
        </form>
        <form action="ForoRespuesta.php" method="post">
            <input type="hidden" name="respuestasId" value="$this->id">
            <button type="submit">Ver Respuestas</button>
        </form>
        EOS;
        
        //Unir todo
        $html =<<<EOS3
        <div style="background-color: lightgray; width: 100%; height: 100%;">
        $user_info
        $post_info
        $boton_like
        </div>
        EOS3;

        return $html;
    }

    public static function insertaFav($post, $user){
        $result = false;

        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "INSERT INTO postfav (id_post,id_user) VALUES (%d, '%s')",
            $post->id,
            $user
        );

        $result = $conn->query($query);
        
        if (!$result) 
            error_log($conn->error);

        return $result;
    }

    public static function borraFav($post, $user){
        $result = false;

        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "DELETE FROM postfav WHERE (id_post = %d AND id_user = '%s')",
            $post->id,
            $user
        );

        $result = $conn->query($query);

        if (!$result)
            error_log($conn->error);

        return $result;
    }

    private static function inserta($post){

        $result = false;

        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "INSERT INTO post (id_user, texto, imagen, likes, origen, tags, fecha)
                       VALUES ('%s','%s','%s', %d, %d,'%s', '%s')",
            $post->autor,
            $conn->real_escape_string($post->texto),
            $conn->real_escape_string($post->imagen),
            $post->num_likes,
            !is_null($post->post_origen) ? $post->post_origen : 'null',
            $post->tags,
            $conn->real_escape_string($post->fecha_publicacion)
        );

        $result = $conn->query($query);

        if ($result) {
            $post->id = $conn->insert_id;
            $result = $post;
        } else
            error_log($conn->error);

        return $result;
    }

    public static function actualiza($post){

        $result = false;
        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "UPDATE post M SET M.likes = %d WHERE M.id_post = %d",
            $post->num_likes,
            $post->id
        );

        $result = $conn->query($query);

        if (!$result)
            error_log($conn->error);
         else if ($conn->affected_rows != 1)
            error_log("Se han actualizado '$conn->affected_rows' !");
        
        return $result;
    }

    public function guarda(){

        !$this->id ? self::inserta($this) : self::actualiza($this);

        /*
        if (!$this->id) {
            self::inserta($this);
        } else {
            self::actualiza($this);
        }
        */
        return $this;
    }

    public function guardaFav(){

        !$this->id ? self::insertaFav($this) : self::actualiza($this);

        /*
        if (!$this->id) {
            self::insertaFav($this);
        } else {
            self::actualiza($this);
        }
        */
        return $this;
    }

    public function aumentaLikes($num){
        $this->likes = $this->likes + $num;
    }


    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function setTags($tags){
        $this->tags = $tags;
    }

    public function setLikes($num){
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
