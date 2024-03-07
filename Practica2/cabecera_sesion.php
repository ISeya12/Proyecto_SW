<?php
function mostrarSaludo() {
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, " . $_SESSION['nombre'] . " al foro";

	} else {
		echo "Inicie sesión para publicar en el foro";
	}
}
?>
<header>
	<h1>2Melody</h1>
	<div class="saludo">
	<?php
		mostrarSaludo();
	?>
	</div>
</header>