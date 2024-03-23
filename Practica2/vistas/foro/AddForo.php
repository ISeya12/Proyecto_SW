<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

$post_text = isset($_POST['post_text']) ? $_POST['post_text'] : false;  

$post_image = isset($_POST['image']) ? $_POST['image'] : false;


if($_POST['id_padre'] != "") $post_father= $_POST['id_padre']; 
else $post_father = 'NULL'; 



$user = Usuario::buscaUsuario($username);
$post = $user->publicarPost($post_text, $post_image, $post_father);
$content = creacionPostHTML($post->getAutor(), $post->getImagen(), $post->getLikes(),
                            $post->getTexto(), $post->getId());

require_once RUTA_LAYOUTS;