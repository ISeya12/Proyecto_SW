<?php 

require ('../scripts/helpers_vista/Login_helper.php');
global $isArtist;

$header = generateHeader();
$content = generateFormulary();

$html =<<<EOS
$header
$content
EOS;
    
echo $html;