<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$id_post = $_POST["respuestasId"] ?? NULL;

$content = showResp($id_post);

require_once 'Layout.php';

function showResp($id_post){
    
    if (!isset($_SESSION['username'])){
        $html= "<p> No estas logead@,  <a href= 'Login.php'> <strong>  pulsa aqui para iniciar sesion </strong> </a> </p>";
    }
    else{
        $post_aux= Post::buscarPostPorID($id_post); 

        $html = "<h1> Respuestas a @".$post_aux->getAutor(). "</h1>";

        $html .= "<div style=" . "\"display: inline-block;\" " . ">";
        $html .= $post_aux->generatePostHTML();
        $html .= "</div> <br><br>";

        $posts = Post::obtenerListaDePosts($id_post); 
        foreach($posts as $post){
            $html .= "<div style=" . "\"display: inline-block;\" " . ">";
            $html .= $post->generatePostHTML();
            $html .= "</div> <br><br>";
        }
    }


    return $html;
}
