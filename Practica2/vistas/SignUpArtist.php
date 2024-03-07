<?php

require_once ('../scripts/helpers_vista/SignUp_helper.php');

$html = generateUserImage();
$html .= generateFormularyArtist();

echo $html;