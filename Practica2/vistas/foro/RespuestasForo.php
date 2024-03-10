<?php

require_once '../../../Config.php';
require_once RUTA_CLASSES.'/Post.php';

$id_post = $_POST["respuestasId"] ?? NULL;

$content = showResp($id_post);

require_once RUTA_LAYOUTS;