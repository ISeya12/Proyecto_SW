<?php
    session_start();
    $contentPanel = 'Contenido Principal';
    $_SESSION['login'] = true;
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
        <div style="margin-right: 30px; "> <?php require 'comun/header.php'; ?> </div>
    </div>

    <!-- Barra lateral -->
    <div class="barra_lateral">
        <div> <?php require 'comun/sidebar.php'; ?> </div>    
    </div>

    <!-- Contenido de la app -->
    <main>
        <article>
            <?php echo "$contentPanel"; ?>
        </article>
    </main>

    <footer>
        <div class="music_player"><p> Reproductor de música </p></div>
    </footer>
</body>
</html>