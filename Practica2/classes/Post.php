<?php

class Post{

    private $autor;
    private $texto;
    private $imagen;
    private $num_likes;
    private $tags;
    private $fecha_publicacion;
    private $post_origen;

    function __construct(string $user, string $text = null, string $img = null, string $tags = null, string $origen = null){
    
        $this->autor = $user;
        $this->texto = $text;
        $this->imagen = $img;
        $this->num_likes = 0;
        $this->tags = $tags;
        $this->fecha_publicacion = getdate(null);
        $this->post_origen = $origen;
    }


}