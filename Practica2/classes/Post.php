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


    //Devuelve el tiempo transcurrido desde que se publicó el post hasta ahora
    public function tiempoTranscurrido(){
        //Ejemplo: han pasado 10 segundos: Hace 10 seg
        //Ejemplo: han pasado 2 minutos y 10 segundos: Hace 2 min
        //Ejemplo: han pasado 5 horas y 10 minutos: Hace 5 horas
        //Ejemplo: han pasado 7 dias y 10 horas: Hace 7 dias
    }


    public function getAutor()
    {
        return $this->autor;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
    
    public function getLikes()
    {
        return $this->num_likes;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getFecha()
    {
        return $this->fecha_publicacion;
    }

    public function getPadre()
    {
        return $this->post_origen;
    }
    
}