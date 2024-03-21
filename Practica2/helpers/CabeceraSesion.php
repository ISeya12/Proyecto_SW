<?php

require_once '../../Config.php';

function generateStaticHeader() {
    $iconImage = RUTA_IMG_PATH.'/2MelodyLogo.png';
    if (!islogged()) {
        $loginImage = RUTA_IMG_PATH.'/FotoLoginUser.png';
        $altText = 'Foto de login';
        $link = RUTA_VISTAS_PATH.'/log/Login.php';
        $texto = "Inicie sesión para publicar en el foro";
    } else {
        $loginImage = RUTA_IMG_PATH.'/FotoLogoutUser.png';
        $altText = 'Foto de logout';
        $link = RUTA_VISTAS_PATH.'/log/Logout.php';
        $username = $_SESSION['username'];
        $texto = "Bienvenido !!"; 
    }
    $html = <<<EOS
    <header class= 'header'>
        <p>
            <img src = '$iconImage' alt="Logo app" height="50" width="75">
 
        </p>
        Barra de búsqueda
        <p>
        $texto
        <a href="$link"><img src="$loginImage" height="30" width="30" alt="$altText"></a>
        </p>
    </header>
    EOS;

    return $html;
}


function islogged(){
    return isset($_SESSION['username']);
}