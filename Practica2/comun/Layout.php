<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title> Main Page </title>
</head>

<body>

    <?php 
        require 'Header.php';
        require 'Sidebar.php'; 
    ?>    

    <!-- Contenido de la app -->
    <main>
        <article>
            <?= "$contentPanel" ?>
        </article>
    </main>

    <?php 
        require 'Footer.php';
    ?> 
    
</body>
</html>