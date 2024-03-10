<?php 

require_once 'Config.php';

$id = $_POST['likeId'];
$user = null;
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
}
//Check credentials
$isValid = true;

//Log user or ask again for his account
if($isValid && $user){
    //añadir like BD
    $aux = 1;
    $post = Post::buscarPostPorID($id);
    
    if(Post::likeAsignado($id,$user)){
        $aux = -1;
        Post::borraFav($post, $user);
    }else{
        Post::insertaFav($post, $user);
    }
    
    $usuario = Usuario::buscaUsuario($post->getAutor());
    $usuario->aumentaKarma($aux);
    Usuario::actualiza($usuario);
    
    $post->aumentaLikes($aux);
    Post::actualiza($post);
}
header('Location: Foro.php');
exit();


