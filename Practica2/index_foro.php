<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>2Melody</title>
</head>

<body>
<div id="contenedor">
    <?php
    require('cabecera_sesion.php');
    require('sidebarIzq.php');
    ?>
    <main>
        <article>
            <h1>Foro principal</h1>
            <table width="100%">
                <tr>
                    <td width="5%"></td>
                    <td width="35%"><b> TITULO </b></td>
                    <td width="35%"><b> FECHA </b></td>
                    <td width="35%"><b> RESPUESTAS </b></td>
                    <td width="10%"><b> ACCIONES </b></td> <!-- Nueva columna para acciones -->
                </tr>
            </table>
        </article>
        <a href="escritura_articulo.php">Nuevo artículo</a>

        <?php
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "tu_usuario";
        $password = "tu_contraseña";
        $dbname = "tu_base_de_datos";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tu_tabla";
        $result = $conn->query($sql);

        echo "<table>";
        echo "<tr><th>TITULO</th><th>FECHA</th><th>RESPUESTAS</th><th>ACCIONES</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['respuestas'] . "</td>";
            echo "<td><a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a> | <a href='modificar.php?id=" . $row['id'] . "'>Modificar</a></td>";
            echo "</tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
    </main>

    <?php
    require('pie.php');
    ?>
</div>
</body>
</html>
