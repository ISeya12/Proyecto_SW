<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';

$usuario = $_GET["user"] ?? NULL;
$gustados = $_GET["gustados"] ?? NULL;
$content = showProfile($usuario,$gustados);

require_once RUTA_LAYOUTS;

function showProfile($usuario,$gustados){
    
    if(!$usuario){
        if (isset($_SESSION['username'])){
            $usuario = $_SESSION['username'];
        }
    }

    if($usuario) {
        $html = "<h1> Perfil de @".$usuario. "</h1>"; 

        if($gustados){

            $html = "<h1> Posts Favoritos de @".$usuario. "</h1>"; 
            $posts = Post:: optenerPostsFavPorUser($usuario); 

        }else
            $posts = Post:: obtenerPostsDeUsuario($usuario); 
        
        if(!empty($posts)){
            foreach($posts as $post){
                $html .= "<section class= 'estiloPost'>";
                $html .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                          $post->getTexto(), $post->getId());
                $html .= "</section>";
            }
        }else
            $html .= "<div> <h3> No has dado Like (&#10084) a ningun post</h3></div>";
    }else
        $html = "<h1>  No estas logead@ </h1>";

    return $html;
}
