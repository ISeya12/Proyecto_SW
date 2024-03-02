<header>
	<div>
		<?php
			if (isset($_SESSION['nombre']))
				echo 'Has iniciado sesion como ' . $_SESSION["nombre"];
		?>
	</div>
</header>