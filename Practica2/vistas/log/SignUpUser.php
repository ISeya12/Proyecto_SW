<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/SignUpHelper.php';

$content = generateUserImage();
$content .= generateFormularyUser();
$content .= generateArtistAccountLink();

require_once RUTA_LAYOUTS; 