<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <header> Barra de búsqueda </header>

    <!-- Barra lateral -->
    <div class="barra_lateral" style="background-color: red; float: left; ">
        <?php
            require 'comun/sidebar.php';
        ?>
    </div>

    <!-- Contenido de la app -->
    <div><main>
        <p> Contenido de la aplicación </p>
    </main></div>

</body>
</html>