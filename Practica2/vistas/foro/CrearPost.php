<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'CrearPostVista.php';

if(isset($_POST['id_padre'])) 
    $id_padre= $_POST['id_padre']; 
else 
    $id_padre= NULL; 

$content = generatePostPublicationHTML($id_padre);

require_once RUTA_LAYOUTS;