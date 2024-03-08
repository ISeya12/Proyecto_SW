<?php
require_once 'Config.php';

$contentPanel = '<h1>Foro</h1>';

$autor = Post::getAutor();
$texto = Post::getTexto();
$imagen = Post::getImagen();
$likes = Post::getLikes();
$tags = Post::getTags();
$tiempo = Post::tiempoTranscurrido();
$padre = Post::getPadre();

$contenidoPrincipal .= <<<EOS
    //Foto del autor
    <p>$tiempo</p>
    <p>$autor, $tags</p>
    <p>$texto</p>
EOS;

if ($imagen != NULL){
    //Mostrar imagen 
} 

$contenidoPrincipal .= $likes;

require (RUTA_LAYOUTS . '/Layout.php');
