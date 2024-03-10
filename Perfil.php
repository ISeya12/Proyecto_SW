<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$usuario= $_GET["user"] ?? NULL;

$content = showProfile($usuario);

require_once 'Layout.php';

function showProfile($usuario){
    
    if (!isset($_SESSION['username'])){
        $html= "<p> No estas logead@</p>";
    }

    else {
        $html = "<p> Estas viendo tu perfil, @" . $_SESSION['username'] . "</p>";
    }

    if($usuario) {
        $html= "<h1> Perfil de @".$usuario. "</h1>"; 
        //$usuario= 'user1'; 
        
        $posts= Post:: obtenerPostsDeUsuario($usuario); 
        foreach($posts as $post){
            $html .= "<div style=" . "\"display: inline-block;\" " . ">";
            $html .= $post->generatePostHTML();
            $html .= "</div> <br><br>";
        }
    }


    return $html;
}
