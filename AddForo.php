<?php

require_once 'Config.php';
require_once 'classes/Post.php';
require_once 'classes/Usuario.php';

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
$content = $post->generatePostHTML();

require_once 'Layout.php';