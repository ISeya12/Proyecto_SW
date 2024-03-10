<?php

require_once 'BD.php';
require_once 'Usuario.php';

class Post{

    private $id;
    private $autor;
    private $texto;
    private $imagen;
    private $num_likes;
    private $tags;
    private $fecha_publicacion;
    private $post_origen;

    private function __construct($id, $user, $text, $img, $likes, $tags, $origen, $date){
        
        $this->id = $id;
        $this->autor = $user;
        $this->texto = $text;
        $this->imagen = $img;
        $this->num_likes = $likes;
        $this->post_origen = $origen;
        $this->tags = $tags;
        $this->fecha_publicacion = $date;
     
    }

    public static function crearPost($username, $text, $img, $likes, $tags, $father_post, $date){

        return new Post(null, $username, $text, $img, $likes, $tags, $father_post, $date);
    }

    public static function obtenerPostsDeUsuario($username){

        $result = [];
        $conection = BD::getInstance()->getConexionBd();
        $query = "SELECT * FROM post P WHERE P.id_user IS $username ORDER BY P.fecha DESC";
        $rs = $conection->query($query);
        
        while($fila = $rs->fetch_assoc()){
            $result[] = new Post($fila['id_post'],$fila['id_user'], $fila['texto'], $fila['imagen'], $fila['likes'], $fila['origen'],$fila['tags'],  $fila['fecha']);
        }
        $rs->free();

        return $result;
    }

    public static function obtenerListaDePosts($origen_aux = 'NULL'){

        $post = [];
        $conection = BD::getInstance()->getConexionBd();

        if($origen_aux == 'NULL'){
            $operation = 'IS';
        }
        else {
            $operation = '=';
        }

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

    public static function generatePostDate(){

        $date = getdate();
        $day = $date['mday'];
        $month = $date['mon'];
        $year = $date['year'];

        return $day . "-" . $month . "-" . $year;
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

        //  Imagen de usuario junto a su username
        $user_info =<<<EOS
        <div class="user_info">
            <img src="img/foto_perfil.png" width="50px" height="50px">
            <div style="display: inline-block; position: absolute; margin-top: 15px;"> @$this->autor </div>
        </div>
        EOS;

        //  Texto del post
        $post_info =<<<EOS2
        <div class="post_info">
            <p>$this->texto </p> 
        </div>
        EOS2;

        //  Numero de likes
        $boton_like = <<<EOS3
        <form action="ProcesarLike.php" method="post">
            <input type="hidden" name="likeId" value="$this->id">
            <button type="submit">$this->num_likes &#10084</button>
        </form>
        <form action="Foro.php" method="post">
            <input type="hidden" name="respuestasId" value="$this->id">
            <button type="submit">Ver Respuestas</button>
        </form>
        EOS3;

        //  Unir todo
        $html =<<<EOS4
        <div style="background-color: lightgray; width: 100%; height: 100%;">
        $user_info
        $post_info
        $boton_like
        </div>
        EOS4;

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

        if (!$result) {
            error_log($conn->error);
        }

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

        if (!$result)  {
            error_log($conn->error);
        }

        return $result;
    }

    private static function inserta($post){

        $result = false;
        $conn = BD::getInstance()->getConexionBd();
        $query = sprintf(
            "INSERT INTO post (id_user, texto, imagen, likes, origen, tags, fecha)
                       VALUES ('%s','%s','%s', %d, %s, '%s', '%s')",
            $post->autor,
            $conn->real_escape_string($post->texto),
            is_null($post->imagen) ? 'NULL' : $conn->real_escape_string($post->imagen),
            $post->num_likes,
            is_null($post->post_origen) ? 'NULL' : $post->post_origen,
            $post->tags,
            $conn->real_escape_string($post->fecha_publicacion)
        );

        $result = $conn->query($query);

        if ($result) {
            $post->id = $conn->insert_id;
            $result = $post;
        }
        else {
            error_log($conn->error);
        }

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

        if (!$result) {
            error_log($conn->error);
        }
        else if ($conn->affected_rows != 1) {
            error_log("Se han actualizado '$conn->affected_rows' !");
        }

        return $result;
    }

    public function guarda(){

        if (!$this->id) {
            self::inserta($this);
        }
        else {
            self::actualiza($this);
        }

        return $this;
    }

    public function guardaFav(){

        !$this->id ? self::insertaFav($this, $this->id) : self::actualiza($this);

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
