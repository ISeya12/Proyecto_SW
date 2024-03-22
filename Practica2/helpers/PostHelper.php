<?php

require_once RUTA_CLASSES.'/Post.php';

function creacionPostHTML($autor, $image, $likes, $texto, $id){

    $rutaPFP = RUTA_IMG_PATH.'/FotoPerfil.png';
    $rutaPerfil = RUTA_VISTAS_PATH.'/perfil/Perfil.php';

    //Imagen de usuario junto a su username
    $user_info =<<<EOS
    <div class="user_info">
        <img src= $rutaPFP width="50px" height="50px">
        <div> <a href= "$rutaPerfil?user=$autor" name= "user">
            @$autor</a> </div>
    </div>
    EOS;

    //Texto del post
    $post_info =<<<EOS2
    <div class="post_info">
        <p>$texto </p> 
    </div>
    EOS2;

    //Imagen del post
    $rutaImagen = RUTA_IMG_PATH.'/postImages/'.$image;
    $post_image = "";
    if(!empty($image)){
        $post_image =<<<EOS3
        <div class="post_image">
            <img src= $rutaImagen width="70" heigth="70">
        </div>
        EOS3;
    }

    $rutaLike = RUTA_HELPERS_PATH.'/ProcesarLike.php';
    $rutaRespuestas = RUTA_VISTAS_PATH.'/foro/RespuestasForo.php';
    $rutaCrear = RUTA_VISTAS_PATH.'/foro/CrearPost.php';


    //Numero de likes
    $boton_like = <<<EOS4
    <form action= $rutaLike method="post">
        <input type="hidden" name="likeId" value="$id">
        <button type="submit">$likes &#10084</button>
    </form>
    <form action= $rutaRespuestas method="post">
        <input type="hidden" name="respuestasId" value="$id">
        <button type="submit">Ver Respuestas</button>
    </form>
    <form action= $rutaCrear method="post">
        <input type="hidden" name="id_padre" value="$id">
        <button type="submit">Responder</button>
    </form>
    EOS4;

    //  Unir todo
    $html =<<<EOS5
        <section class= "estiloPost">
        $user_info
        $post_info
        $post_image
        $boton_like
        </section>
    EOS5;

    return $html;
}


function showResp($id_post){

    $rutaNoLog = RUTA_VISTAS_PATH.'/log/Login.php';

    if (!isset($_SESSION['username']))
        $html= "<p> No estas logead@,  <a href= $rutaNoLog> <strong>  pulsa aqui para iniciar sesion </strong> </a> </p>";
    else{
        $post_aux= Post::buscarPostPorID($id_post); 

        $html = "<h1> Respuestas a @".$post_aux->getAutor(). "</h1>";

        $html .= "<section class= 'estiloPost'>";
        $html .= creacionPostHTML($post_aux->getAutor(), $post_aux->getImagen(), $post_aux->getLikes(),
                                  $post_aux->getTexto(), $post_aux->getId());
        $html .= "</section> ";

        $posts = Post::obtenerListaDePosts($id_post); 
        foreach($posts as $post){
            $html .="<section class= 'estiloPost'>";
            $html .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                      $post->getTexto(), $post->getId());
            $html .= "</section>";
        }
    }

    return $html;
}

function showTestPosts(){

    $content = "<h1> Posts </h1>";
    
    $posts = Post::obtenerListaDePosts();

    foreach($posts as $post){
        $content .= "<section class= 'estiloPost'>";
        $content .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                     $post->getTexto(), $post->getId());
    
        $content .= "</section>";
    }

    return $content;
}

function showTestPostsMod(){

    $rutaMod = RUTA_HELPERS_PATH.'ProcesarModificar.php';

    $content = "<h1> Posts </h1>";
    
    $posts = Post::obtenerPostsDeUsuario($_SESSION['username']);

    foreach($posts as $post){
        $id = $post->getId();
        $content .= <<<EOS
            <form action= $rutaMod method="post">
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

function generatePostPublicationHTML($id_padre= 'NULL'){

    $rutaCrear = RUTA_VISTAS_PATH.'/foro/Addforo.php';
    $html =<<<EOS
    <fieldset>
        <legend style="text-align: center; "><strong> Nueva Publicación </strong></legend>
        <form name="datos_post" action= $rutaCrear method="post" enctype="multipart/form-data">
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

function showTestPostsElim(){

    $content = "<h1> Posts </h1>";
   
    $posts = Post::obtenerPostsDeUsuario($_SESSION['username']);

    foreach($posts as $post){

        $rutaEliminar = RUTA_HELPERS_PATH.'/ProcesarEliminar.php';
        $content .= <<<EOS
            <form action= $rutaEliminar method="post">
            <input type="hidden" name="EliminarID" value= '$post->getId()'>
            <button type="submit"> Eliminar</button>
        </form>
        EOS;
        $content .= "<section class= 'estiloPost'>";
        $content .= creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                                     $post->getTexto(), $post->getId());
        $content .= "</section>";
    }

    return $content;
}

function mostrar_perfil(){
    echo("Holaaaaaa"); 
}