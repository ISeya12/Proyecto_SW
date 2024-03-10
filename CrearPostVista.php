<?php



function generatePostPublicationHTML(){

    $html =<<<EOS
    <fieldset>
        <legend style="text-align: center; "><strong> Nueva Publicación </strong></legend>
            <form name="datos_post" action="Addforo.php" method="post" enctype="multipart/form-data">
                Mensaje: <textarea name="post_text" required style="resize: none; "></textarea><br><br>
                Imagen: <input name="post_image" type="file" height="200" width="200">
                <br><br>
                Publicar <input type="submit">
            </form>
    </fieldset>
    EOS;

    return $html;
}