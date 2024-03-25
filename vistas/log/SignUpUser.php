<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/SignUpHelper.php';

$imgUser = generateUserImage();
$form = generateFormularyUser();
$artist_lnk = generateArtistAccountLink();

$content= <<<EOS
    <section class= 'formulario_style'> 
    $imgUser
    $form
    $artist_lnk
    </section> 
EOS; 

require_once RUTA_LAYOUTS; 