<?php
    $contentPanel = 'NUEVO ARTICULO';

    session_start();
    
    #if(!isset($_SESSION['login'])) {
    #    echo "Inicie sesión para poder publicar.<br>";
    #    echo "<br> <a href='login.php'>Login</a>";
    #    exit;
    #}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserción de artículo</title>
</head>
<body>
    <h1>Nuevo Artículo</h1>
    <form name="Datos" method="post" action="addforo.php" enctype="multipart/form-data">
        <input type="hidden" name="respuestas" value="<?php echo $respuestas; ?>">
        <input type="hidden" name="identificador" value="<?php echo $id; ?>">

        Título: <input type="text" name="titulo" size="25"><br><br>
        Mensaje: <textarea name="mensaje"></textarea><br><br>
        Adjuntar imagen: <input type="file" name="imagen"><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

