<?php 

require_once '../../Config.php';
require_once RUTA_HELPERS.'/LoginHelper.php';

global $isArtist;


$header = generateHeader();
$formulario = generateFormulary();

$content =<<<EOS
    $header
    $formulario
EOS;
    
require_once RUTA_LAYOUTS; 
