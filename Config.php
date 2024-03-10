<?php 

//  Rutas de archivos
define('RAIZ_APP', dirname(__DIR__));
define('RUTA_P2', RAIZ_APP.'/Practica2');
define('RUTA_BD', RUTA_P2.'/BD');
define('RUTA_CLASSES', RUTA_P2.'/classes');
define('RUTA_CSS' , RUTA_P2.'/css');
define('RUTA_IMG' , RUTA_P2.'/img');
define('RUTA_HELPERS', RUTA_P2.'/helpers');
define('RUTA_VISTAS', RUTA_P2.'/vistas');
define('RUTA_LAYOUTS' , RUTA_VISTAS.'/layout/Layout.php');


//  Parámetros BD
define('BD_HOST', 'localhost');
define('BD_NAME', '2melody');

// Cuenta a crear en el phpmyadmin --> Desde phpmyadmin, pulsar pestaña Cuentas de usuario, pulsar Agregar nuevo Usuario,
// y añadir el nombre y la contraseña de aqui abajo. Al añadir, seleccionar privilegios globales. 
define('BD_USER', 'user');
define('BD_PASS', 'pass');


require_once '/Practica2/classes/BD.php';
require_once '/Practica2/classes/Usuario.php';
require_once '/Practica2/classes/Post.php';
session_start();