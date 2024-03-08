<?php

require_once '../scripts/helpers_vista/Cabecera_sesion.php';

$contenido = mostrarSaludo();
$header = <<<EOS
$contenido
EOS;

echo $contenido;