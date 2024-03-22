<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';

$username = $_SESSION['username'];
$post_text = $_POST['post_text'];  
$post_image = null;


if($_POST['id_padre'] != "") $post_father= $_POST['id_padre']; 
else $post_father= 'NULL'; 


if(isset($_POST['images'])){
    $post_image = $_POST['images'];
}

$user = Usuario::buscaUsuario($username);
$post = $user->publicarPost($post_text, $post_image, $post_father);
$content = creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                            $post->getTexto(), $post->getId());

require_once RUTA_LAYOUTS;