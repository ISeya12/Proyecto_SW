<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href= "<?= RUTA_CSS.'/estilos.css'?>">
    <title> Document </title>
</head>
<body>
<?php 
    require_once 'Cabecera.php';
    require_once 'Sidebar.php'; 
?>

<main style="display: inline-block;">
    <?= $content ?>
</main>

<?php 
    require_once 'Footer.php'; 
?>
</body>
</html>