<?php

require_once RUTA_CLASSES.'/Producto.php';

function creacionProductoHTML($autor, $image, $likes, $texto, $id, $yoYYoMismo){
    
}

function showProducts($yoYYoMismo){
    
    $content = "<h1 class = 'texto_infor'> Artículos </h1>";
    $content .= "<section class = 'listaArticulos'>";
    $posts = Producto::obtenerListaDeProductos();

    foreach($posts as $post){
        $content .= creacionProductoHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                     $post->getTexto(), $post->getId(), $yoYYoMismo);   
    }
    $content .= "</section>";

    return $content;
}