<?php 

require_once 'Config.php';

$id = $_POST['id_padre'];
$post = Post::buscarPostPorID($id);
Post::actualizaPost($post);
header('Location: Foro.php');
exit();


