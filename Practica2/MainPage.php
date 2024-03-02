<?php
    $contentPanel = 'Pagina principal';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title> Main Page </title>
</head>

<body>

    <!-- Cabecera -->
    <div class="cabecera">
        <?php
            require 'comun/header.php';
        ?>
    </div>

    <!-- Barra lateral -->
    <div class="barra_lateral">
        <?php
            require 'comun/sidebar.php';
        ?>
    </div>

    <!-- Contenido de la app -->
    <main>
        <article>
            <?= $contentPanel ?>
        </article>
    </main>

    <footer>
        <div class="music_player"><p> Reproductor de música </p></div>
    </footer>
</body>
</html>