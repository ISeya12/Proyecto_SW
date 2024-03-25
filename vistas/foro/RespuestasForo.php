<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/PostHelper.php';

$id_post = $_POST["respuestasId"] ?? NULL;
$yo = isset($_SESSION['username']) ? $_SESSION['username'] : null;

$content = showResp($id_post, $yo);

require_once RUTA_LAYOUTS;