<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title> Document </title>
</head>
<body>
    
    <div>
        <div class="header">
            <?php 
                require_once 'Cabecera.php';
            ?>
        </div>

        <div class="sidebar" style="display: inline-block; ">
            <?php require_once 'Sidebar.php'; ?>
        </div>
            
        <div class="main_content" style="display: inline-block;">
            <main>
                <?= $content ?>
            </main>
        </div>

        <div class="footer">
            <?php require_once 'Footer.php'; ?>
        </div>
    </div>

</body>
</html>
