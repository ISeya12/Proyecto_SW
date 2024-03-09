<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];
$imagen_nombre = $_FILES['imagen']['name'];
$imagen_temp = $_FILES['imagen']['tmp_name'];


$imagen_ruta = "carpeta_destino/" . $imagen_nombre;
move_uploaded_file($imagen_temp, $imagen_ruta);

$sql = "INSERT INTO tu_tabla (titulo, mensaje, imagen) VALUES ('$titulo', '$mensaje', '$imagen_ruta')";
if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
