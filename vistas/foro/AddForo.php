<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

$post_text = isset($_POST['post_text']) ? $_POST['post_text'] : false;  

if (isset($_POST['image'])){
    $post_image = $_POST['image'];
    //Comprobar si hay algun archivo con el mismo nombre
    //Subir el archivo
    //move_uploaded_file($archivo_temporal, $ruta_destino);
}
else
    $post_image = false;
//$post_image = isset($_POST['image']) ? $_POST['image'] : false;


if($_POST['id_padre'] != "") $post_father= $_POST['id_padre']; 
else $post_father = 'NULL'; 



$user = Usuario::buscaUsuario($username);
$post = $user->publicarPost($post_text, $post_image, $post_father);


header('Location: Foro.php'); 
exit(); 