<?php

function mostrarSaludo() {

	$html =<<<EOS
	<header>
	<h1> 2Melody </h1>
	<div class="saludo">
		<p> 
	EOS;

	if (isset($_SESSION['login']) && ($_SESSION['login'] === true)) {
		$html .= "Bienvenido, " . $_SESSION['username'] . " al foro\n";
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
