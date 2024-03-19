<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/SignUpHelper.php';

$html = generateUserImage();
$html .= generateFormularyUser();
$html .= generateArtistAccountLink();

echo $html;