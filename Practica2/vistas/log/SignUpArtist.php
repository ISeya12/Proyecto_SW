<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/SignUpHelper.php';

$content = generateUserImage();
$content .= generateFormularyArtist();

require_once RUTA_LAYOUTS; 