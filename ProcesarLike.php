<?php 

require_once 'Config.php';

$id = $_POST['likeId'];
$user = $_SESSION['username'];
//Check credentials
$isValid = true;

//Log user or ask again for his account
if($isValid){
    //añadir like BD
    $aux = 1;
    $post = Post::buscarPostPorID($id);
    
    if(Post::likeAsignado($id,$user)){
        $aux = -1;
        Post::borraFav($post, $user);
    }else{
        Post::insertaFav($post, $user);
    }
    
    ($post->getAutor)->aumentaKarma($aux);
    $post->aumentaLikes($aux);

    Post::actualiza($post);
}
header('Location: Foro.php');
exit();


