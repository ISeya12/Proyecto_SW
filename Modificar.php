<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$content = ModificatePost();

require_once 'Layout.php';

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
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
        //echo $id;
    }

    return $content;
}

