<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$content = showTestPosts();

require_once 'Layout.php';

function showTestPosts(){

    $content = "<h1> Posts </h1>";
   
    $posts = Post::obtenerPostsDeUsuario($_SESSION['username']);

    foreach($posts as $post){
        $id = $post->getId();
        $content .= <<<EOS
            <form action="ProcesarEliminar.php" method="post">
            <input type="hidden" name="EliminarID" value="$id">
            <button type="submit"> Eliminar</button>
        </form>
        EOS;
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
    }

    return $content;
}
