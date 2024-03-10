<?php

require_once '../../../Config.php';
require_once RUTA_HELPERS.'SignUp_helper.php';

$html = generateUserImage();
$html .= generateFormularyArtist();

echo $html;