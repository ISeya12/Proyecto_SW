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
            <form action="ProcesarModificar.php" method="post">
            <input type="hidden" name="ModificarID" value="$id">
            <button type="submit"> Modificar</button>
        </form>
        EOS;
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
    }

    return $content;
}

function generatePostPublicationHTML($id_padre= 'NULL'){
    $html =<<<EOS
    <fieldset>
        <legend style="text-align: center; "><strong> Nueva Publicación </strong></legend>
        <form name="datos_post" action="Addforo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_padre" value="$id_padre">
            Mensaje: <textarea name="post_text" required style="resize: none; "></textarea><br><br>
            Imagen: $images
            <br><br>
            Publicar <input type="submit">
        </form>
    </fieldset>
    EOS;

    return $html;
}

