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
        $texto = "2Melody, una app para perder el tiempo escuchando música sin límites!"; 
    }
    $html = <<<EOS
    <header class= 'header'>
        <p>
            <img src = '$iconImage' alt="Logo app" height="50" width="75">
            $texto
        </p>
        <a href="$link"><img src="$loginImage" height="30" width="30" alt="$altText"></a>
    </header>
    EOS;

    return $html;
}


function islogged(){
    return isset($_SESSION['username']);
}