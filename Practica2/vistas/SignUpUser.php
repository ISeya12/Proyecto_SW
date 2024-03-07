<?php

require_once ('../scripts/helpers_vista/SignUp_helper.php');

$html = generateUserImage();
$html .= generateFormularyUser();
$html .= generateArtistAccountLink();

echo $html;