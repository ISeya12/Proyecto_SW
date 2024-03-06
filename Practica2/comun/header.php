<?php
	$header = <<<EOS
	<header>	
		Bienvenid@, {$_SESSION['username']}
	</header>
	EOS;

	echo $header;