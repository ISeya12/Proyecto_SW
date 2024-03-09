<?php

require_once 'Config.php';
require_once 'SignUp_helper.php';

$html = generateUserImage();
$html .= generateFormularyArtist();

echo $html;