<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$content = showTestPosts();

require_once 'Layout.php';

function showTestPosts(){

    $content = "<h1> Posts </h1>";
    $num_posts = 4;
    $posts = Post::obtenerListaDePostsEjemplo($num_posts);

    foreach($posts as $post){
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
    }

    return $content;
}