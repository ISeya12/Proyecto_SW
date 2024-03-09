<?php

require_once '../Config.php';
require_once RUTA_CLASSES . '/Post.php';

$content = showPost();

require_once RUTA_LAYOUTS;

function showPost(){

    $user_id = 1;
    $text = "Texto de ejemplo";
    $img = null;
    $tags = null;
    $father_post = null;
    $date = "2024-03-08";

    $post = Post::crearPost($user_id, $text, $img, $tags, $father_post, $date);
    $content = $post->generatePostHTML();

    return $content;
}
