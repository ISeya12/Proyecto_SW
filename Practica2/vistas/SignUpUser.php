<?php

require_once RUTA_HELPERS. '/SignUp_helper.php';

$html = generateUserImage();
$html .= generateFormularyUser();
$html .= generateArtistAccountLink();

echo $html;