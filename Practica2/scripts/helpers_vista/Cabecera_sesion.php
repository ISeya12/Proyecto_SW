<?php

function generateStaticHeader(){

	$html =<<<EOS
	<header>
		<p>
			2Music, una app para perder el tiempo escuchando música sin limites!
		</p>
	</div>
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
