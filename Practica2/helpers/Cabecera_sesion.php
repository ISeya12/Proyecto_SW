<?php

function generateStaticHeader() {
    $IconImage = 'img/2_Melody_logo_.png';
    if (!islogged()) {
        $loginImage = 'img/foto_login_user.png';
        $altText = 'Foto de login';
        $link = '../log/Login.php';
    } else {
        $loginImage = 'img/foto_logout_user.png';
        $altText = 'Foto de logout';
        $link = '../log/Logout.php'; 
    }
    $html = <<<EOS
    <header>
        <p>
            2Melody, una app para perder el tiempo escuchando música sin límites!
        </p>
        <li><a href="$link"><img src="$loginImage" height="30" width="30" alt="$altText"></a></li>
    </header>
    EOS;

    return $html;
}

function mostrarSaludo() {

	$html =<<<EOS
	<header>
	<div class="saludo">
	<p> 
	EOS;

	if (isset($_SESSION['login']) && ($_SESSION['login'] === true)) {
		$html .= "Bienvenido, " . $_SESSION['username'];
    }else {
		$html .= "Inicie sesión para publicar en el foro\n";
    }
    $html .=<<<EOS2
    </p>
    </div>
    </header>
    EOS2;

	return $html;
}

function islogged(){
    return isset($_SESSION['username']);
}