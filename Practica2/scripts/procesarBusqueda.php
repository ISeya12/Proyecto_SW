<?php
    $nombre_a_buscar= filter_input(INPUT_POST, 'contenido', FILTER_SANITIZE_SPECIAL_CHARS); 
    $filtro_busqueda= filter_input(INPUT_POST, 'filtro', FILTER_SANITIZE_SPECIAL_CHARS); 

    //Habria que llamar a metodos de la clase Post que te devolvieran los mensajes asociados al usuario que has buscado 

?> 