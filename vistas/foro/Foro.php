<?php

require_once '../../Config.php';
require_once RUTA_HELPERS.'/PostHelper.php';

$yo = isset($_SESSION['username']) ? $_SESSION['username'] : null;

$content = showTestPosts($yo);

require_once RUTA_LAYOUTS;