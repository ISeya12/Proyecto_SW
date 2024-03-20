<?php 

require_once '../../Config.php';
require_once RUTA_HELPERS.'/LoginHelper.php';

global $isArtist;


$head= <<<EOS
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=RUTA_CSS_PATH?>/Estilos.css">
    <title> 2Music </title>
</head>


EOS; 

$header = generateHeader();
$content = generateFormulary();

$html =<<<EOS
    $head
    $header
    $content
EOS;
    
echo $html;
