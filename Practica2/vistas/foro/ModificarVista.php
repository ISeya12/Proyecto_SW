<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';


$post = Post::buscarPostPorID($_POST['ModificarID']);
$content = generatePostPublicationHTML($post);

require_once 'Layout.php';

function generatePostPublicationHTML($post){
    $id = $post->getId();
    $tx = $post->getTexto();
    $images = displayAllLocalImages();
    $html =<<<EOS
    <fieldset>
        <legend style="text-align: center; "><strong> Modificacion </strong></legend>
        <form name="datos_post" action="ProcesarModificacion.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_padre" value="$id">
            Mensaje: <textarea name="post_text" required style="resize: none;">$tx</textarea><br><br>
            Imagen: $images
            <br><br>
            Publicar <input type="submit">
        </form>
    </fieldset>
    EOS;
    

    return $html;
}
function displayAllLocalImages(){

    $html =<<<EOS
    <select name="images">
        <option>  </option>
        <option> Image1 </option>
        <option> Image2 </option>
        <option> Image3 </option>
    </select>
    EOS;

    return $html;
}

