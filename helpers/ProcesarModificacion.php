<?php 

require_once '../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';

$id = $_POST['id'];
$tx = $_POST['postText'];
$img = $_POST['images'];

$post = Post::buscarPostPorID($id);
$post->setTexto($tx);
$post->setImagen($img);

Post::actualiza($post);

header('Location:'. RUTA_VISTAS_PATH .'/foro/Foro.php');
exit();