<?php 

require_once 'Config.php';


$id = $_POST['ModificarID'];
$user = null;
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
}
$isValid = true;

if($isValid && $user){
    $post = Post::buscarPostPorID($id);
    $usuario = Usuario::buscaUsuario($post->getAutor());
    Post::actualizaPost($post);
}
header('Location: Foro.php');
exit();


