<?php


function generatePostPublicationHTML(){

    $images = displayAllLocalImages();

    $html =<<<EOS
    <fieldset>
        <legend style="text-align: center; "><strong> Nueva Publicación </strong></legend>
        <form name="datos_post" action="Addforo.php" method="post" enctype="multipart/form-data">
            Mensaje: <textarea name="post_text" required style="resize: none; "></textarea><br><br>
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
        <option> Perfil1 </option>
        <option> Perfil2 </option>
        <option> Perfil3 </option>
        <option> Image1 </option>
        <option> Image2 </option>
        <option> Image3 </option>
    </select>
    EOS;

    return $html;
}