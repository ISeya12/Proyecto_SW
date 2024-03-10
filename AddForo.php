<?php


require_once 'Config.php';
require_once 'classes/Post.php';
require_once 'classes/Usuario.php';

$allowed = array( 'jpg', 'png' );

$username = $_SESSION['username'];
$post_text = $_POST['post_text'];
$post_image = null;

if(isset($_FILES['post_image']) && checkFileExtension($_FILES['post_image']['name'], $allowed)){
    echo 'Imagen Subida';
    $post_image = $_FILES['post_image'];
}

$user = Usuario::buscaUsuario($username);
$post = $user->publicarPost($post_text, $post_image);
$content = $post->generatePostHTML();

require_once 'Layout.php';

function checkFileExtension($file, $allowed){

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    return in_array($ext, $allowed);
}