<?php 

require_once 'Config.php';
require_once 'Login_helper.php';


global $isArtist;

$header = generateHeader();
$content = generateFormulary();
$errors = generateErrorMessage();

$html =<<<EOS
$header
$content
$errors
EOS;

echo $html;