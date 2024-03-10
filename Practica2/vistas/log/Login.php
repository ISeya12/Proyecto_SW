<?php 

require_once '../../../Config.php';
require_once RUTA_HELPERS.'Login_helper.php';


global $isArtist;

$header = generateHeader();
$content = generateFormulary();

$html =<<<EOS
    $header
    $content
EOS;
    
echo $html;