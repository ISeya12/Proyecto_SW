<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$usuario= $_GET["user"] ?? NULL;

$content = showProfile($usuario);

require_once 'Layout.php';

function showProfile($usuario){
    
    if (!isset($_SESSION['username'])){
        $html= "<p> No estas logead@,  <a href= 'Login.php'> <strong>  pulsa aqui para iniciar sesion </strong> </a> </p>";
    }

    else {
        $html = "<p> Estas viendo tu perfil, @" . $_SESSION['username'] . "</p>";

        $logout = "<p> ¿Quieres cerrar sesión? <a href= 'Logout.php'> <strong> pulsa aquí </strong> </p>"; 

        $html .= $logout; 
    }

    if($usuario) {
        $html= "<h1> Perfil de @".$usuario. "</h1>"; 
        $posts= Post:: obtenerPostsDeUsuario($usuario); 
        foreach($posts as $post){
            $html .= "<div style=" . "\"display: inline-block;\" " . ">";
            $html .= $post->generatePostHTML();
            $html .= "</div> <br><br>";
        }
    }


    return $html;
}
