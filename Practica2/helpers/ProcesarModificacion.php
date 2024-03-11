<?php 

require_once 'Config.php';

$id = $_POST['id_padre'];
$tx = $_POST['post_text'];
$img = $_POST['images'];
$post = Post::buscarPostPorID($id);
$post->setTexto($tx);
$post->setImagen($img);

Post::actualiza($post);
header('Location: Foro.php');
exit();


