<?php

require_once '../Config.php';

$content = showProfile();

require_once RUTA_LAYOUTS;

function showProfile(){
    
    $html = "<p> Estas viendo tu musica </p>";

    return $html;
}
