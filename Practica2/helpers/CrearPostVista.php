<?php
function generatePostPublicationHTML($id_padre= 'NULL'){

    $images = displayAllLocalImages();

    $html =<<<EOS
    <fieldset>
        <legend ><strong> Nueva Publicación </strong></legend>
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