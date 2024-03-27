<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';

$usuario = $_GET["user"] ?? NULL;
$favs = $_GET["favs"] ?? NULL;
$content = showProfile($usuario,$favs);

require_once RUTA_LAYOUTS;

function showProfile($usuario,$favs){
    
    if(!$usuario){
        if (isset($_SESSION['username']))
            $usuario = $_SESSION['username'];
    }

    if($usuario) {
        $html = "<h1 class = 'texto_infor'> Perfil de @".$usuario."</h1>"; 

        if($favs){
            $html = "<h1 class = 'texto_infor'> Posts Favoritos de @".$usuario."</h1>"; 
            $posts = Post::obtenerPostsFavPorUser($usuario); 
        }else
            $posts = Post::obtenerPostsDeUsuario($usuario); 
        
        if(!empty($posts)){
            $html .= "<section class = 'listaPost'>";
            foreach($posts as $post){
                $html .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                          $post->getTexto(), $post->getId(), $usuario);
            }
            $html .= "</section>";
        }else
            $html .= "<section class = 'listaPost'> <h3> No has dado Like (&#10084) a ningún post</h3></section>";
    }else
        $html = "<h1 class = 'texto_infor'>  No estas logead@ </h1>";

    return $html;
}
