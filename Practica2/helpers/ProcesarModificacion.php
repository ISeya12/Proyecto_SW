<?php 

require_once '../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';


$id = $_POST['id'];
$user = null;

if(isset($_SESSION['username']))
    $user = $_SESSION['username'];

$isValid = true;

if($isValid && $user){
    $post = Post::buscarPostPorID($id);
    $usuario = Usuario::buscaUsuario($post->getAutor());
    Post::actualizaPost($post);
}

header('Location:'. RUTA_VISTAS_PATH .'/foro/Foro.php');
exit();