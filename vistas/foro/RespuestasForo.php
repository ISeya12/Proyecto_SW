<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/PostHelper.php';

$id_post = $_POST["respuestasId"] ?? NULL;

$content = showResp($id_post);

require_once RUTA_LAYOUTS;