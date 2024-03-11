<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title> 2Music </title>
</head>
<body>

    <div class="header">
        <?php require_once 'Cabecera.php'; ?>
    </div>

    <div class="sidebar">
        <?php require_once 'Sidebar.php'; ?>
    </div>

    <div class="content">
        <main style="display: inline-block;">
            <?= $content ?>
        </main>
    </div>


    <!-- Incluir footer proximamente = reproductor de música -->
</body>
</html>