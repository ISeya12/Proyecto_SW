<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
<title> <?= $titulo_pagina ?> </title>
</head>

<body>
 

    <?php 
        require 'Header.php'; 
        require 'Sidebar.php'; 
    ?>    

    <!-- Contenido de la app -->
    <main>
        <article>
            <?= $contentPanel ?>
        </article>
    </main>

    <?php 
        require 'Footer.php';
    ?> 


    
</body>
</html>