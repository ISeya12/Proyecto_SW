<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';

$usuario= $_GET["user"] ?? NULL;

$content = showProfile($usuario);

require_once RUTA_LAYOUTS;

function showProfile($usuario){
    
    if (!isset($_SESSION['username']))
        $html= "<p> No estas logead@</p>";
    else 
        $html = "<p> Estas viendo tu perfil, @" . $_SESSION['username'] . "</p>";

    if($usuario) {
        $html= "<h1> Perfil de @".$usuario. "</h1>"; 
        //$usuario= 'user1'; 
        
        $posts= Post:: obtenerPostsDeUsuario($usuario); 
        foreach($posts as $post){
            $html .= "<section class= 'estiloPost'>";
            $html .= $post->generatePostHTML();
            $html .= "</section>";
        }
    }

    return $html;
}
