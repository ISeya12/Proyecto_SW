<?php 

//  Rutas de archivos
define('RAIZ_APP', __DIR__);
define('RUTA_P2', '/Proyecto_SW/Practica2');
define('RUTA_BD', RAIZ_APP.'/BD');
define('RUTA_CLASSES', RAIZ_APP.'/classes');
define('RUTA_CSS' , RAIZ_APP.'/css');
define('RUTA_IMG' , RAIZ_APP.'/img');
define('RUTA_DOCS', RAIZ_APP.'/InfoFiles');
define('RUTA_SCRIPTS', RAIZ_APP.'/scripts');
define('RUTA_HELPERS', RUTA_SCRIPTS . '/helpers_vista');
define('RUTA_VISTAS', RUTA_P2.'/vistas');
define('RUTA_VISTAS_PATH',RAIZ_APP.'/vistas');
define('RUTA_LAYOUTS' , RUTA_VISTAS_PATH . '/comun/layout.php');


//  Parámetros BD
define('BD_HOST', 'localhost');
define('BD_NAME', 'localhost');

// Cuenta a crear en el phpmyadmin --> Desde phpmyadmin, pulsar pestaña Cuentas de usuario, pulsar Agregar nuevo Usuario,
// y añadir el nombre y la contraseña de aqui abajo. Al añadir, seleccionar privilegios globales. 
define('BD_USER', 'user');
define('BD_PASS', 'pass');
