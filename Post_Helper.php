<?php
    require_once('Config.php'); 

    function creacionPostHTML($autor, $image, $likes, $texto, $id){

        //  Imagen de usuario junto a su username
        $user_info =<<<EOS
        <div class="user_info">
            <img src="img/foto_perfil.png" width="50px" height="50px">
            <div style="display: inline-block; position: absolute; margin-top: 15px;"> <a href= "Perfil.php?user= $autor" name= "user">
             @$autor</a> </div>
        </div>
        EOS;

        //  Texto del post
        $post_info =<<<EOS2
        <div class="post_info">
            <p>$texto </p> 
        </div>
        EOS2;

        //  Imagen del post
        $post_image = "";

        if(!empty($image)){
            $post_image =<<<EOS3
            <div class="post_image">
                <img src="img/postImages/$image.jpg" width="70" heigth="70">
            </div>
            EOS3;
        }
 
        //  Numero de likes
        $boton_like = <<<EOS4
        <form action="ProcesarLike.php" method="post">
            <input type="hidden" name="likeId" value="$id">
            <button type="submit">$likes &#10084</button>
        </form>
        <form action="Foro.php" method="post">
            <input type="hidden" name="respuestasId" value="$id">
            <button type="submit">Ver Respuestas</button>
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



    function mostrar_perfil(){

        echo("Holaaaaaa"); 

    }

