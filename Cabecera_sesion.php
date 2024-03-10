<?php

require_once 'Config.php'; 
require_once 'Verificador.php'; 

function generateStaticHeader() {
    if (!islogged()) {
        $loginImage = 'img/foto_login_user.png';
        $altText = 'Foto de login';
        $link = 'Login.php';
    } else {
        $loginImage = 'img/foto_logout_user.png';
        $altText = 'Foto de logout';
        $link = 'Logout.php'; 
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
	}
	else {
		$html .= "Inicie sesión para publicar en el foro\n";
	}

	$html .=<<<EOS2
		</p>
	</div>
	</header>
	EOS2;

	return $html;
}
