<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/PostHelper.php';

$content = showTestPostsMod();

require_once RUTA_LAYOUTS;

/*
function ModificatePost(){

    $content = "<h1> Posts </h1>";
   
    $posts = Post::obtenerPostsDeUsuario($_SESSION['username']);

    foreach($posts as $post){
        $id = $post->getId();
        $content .= <<<EOS
            <form action="ModificarVista.php" method="post">
            <input type="hidden" name="ModificarID" value="$id">
            <button type="submit"> Modificar</button>
        </form>
        EOS;
        $content .= "<section class= 'estiloPost'>";
        $content .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                     $post->getTexto(), $post->getId());
        $content .= "</section>";
    }

    return $content;
}
*/