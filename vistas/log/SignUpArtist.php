<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/SignUpHelper.php';

$imgUser = generateUserImage();
$form = generateFormularyArtist();

$content= <<<EOS
    <section class= 'formulario_style'> 
        $imgUser
        $form
    </section> 

EOS; 

require_once RUTA_LAYOUTS; 