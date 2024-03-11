<?php

function creacionPostHTML($autor, $image, $likes, $texto, $id){

    //Imagen de usuario junto a su username
    $user_info =<<<EOS
    <div class="user_info">
        <img src="img/foto_perfil.png" width="50px" height="50px">
        <div style="display: inline-block; position: absolute; margin-top: 15px;"> <a href= "Perfil.php?user=$autor" name= "user">
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
    $post_image = "";

    if(!empty($image)){
        $post_image =<<<EOS3
        <div class="post_image">
            <img src="img/postImages/$image.jpg" width="70" heigth="70">
        </div>
        EOS3;
    }

    //Numero de likes
    $boton_like = <<<EOS4
    <form action="ProcesarLike.php" method="post">
        <input type="hidden" name="likeId" value="$id">
        <button type="submit">$likes &#10084</button>
    </form>
    <form action="RespuestasForo.php" method="post">
        <input type="hidden" name="respuestasId" value="$id">
        <button type="submit">Ver Respuestas</button>
    </form>
    <form action="CrearPost.php" method="post">
        <input type="hidden" name="id_padre" value="$id">
        <button type="submit">Responder</button>
    </form>
    EOS4;

    //  Unir todo
    $html =<<<EOS5
        <div style="background-color: lightgray; width: 100%; height: 100%;">
        $user_info
        $post_info
        $post_image
        $boton_like
        </div>
    EOS5;

    return $html;
}

function showResp($id_post){

    if (!isset($_SESSION['username']))
        $html= "<p> No estas logead@,  <a href= 'Login.php'> <strong>  pulsa aqui para iniciar sesion </strong> </a> </p>";
    else{
        $post_aux= Post::buscarPostPorID($id_post); 

        $html = "<h1> Respuestas a @".$post_aux->getAutor(). "</h1>";

        $html .= "<div style=" . "\"display: inline-block;\" " . ">";
        $html .= $post_aux->generatePostHTML();
        $html .= "</div> <br><br>";

        $posts = Post::obtenerListaDePosts($id_post); 
        foreach($posts as $post){
            $html .= "<div style=" . "\"display: inline-block;\" " . ">";
            $html .= $post->generatePostHTML();
            $html .= "</div> <br><br>";
        }
    }

    return $html;
}

function showTestPosts(){

    $content = "<h1> Posts </h1>";
    
    $posts = Post::obtenerListaDePosts();

    foreach($posts as $post){
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
    }

    return $content;
}

function showTestPostsMod(){

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

function showTestPostsElim(){

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

function mostrar_perfil(){
    echo("Holaaaaaa"); 
}