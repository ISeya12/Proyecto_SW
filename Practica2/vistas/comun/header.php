<?php

require_once __DIR__.'../../scripts/cabecera_sesion.php';

$contenido = mostrarSaludo();
$header = <<<EOS
$contenido
EOS;