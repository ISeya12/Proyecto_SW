<?php 

require_once '../../Config.php';
require_once RUTA_HELPERS.'/LoginHelper.php';

global $isArtist;

$message = generateHeader();
$formulario = generateFormulary();

$content =<<<EOS
    <section class= 'formulario_style'> 
    $message
    $formulario
    </section> 
EOS;
    
require_once RUTA_LAYOUTS; 
