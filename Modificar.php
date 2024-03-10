<?php

require_once 'Config.php';
require_once 'classes/Post.php';

$content = showTestPosts();

require_once 'Layout.php';

function showTestPosts(){

    $content = "<h1> Posts </h1>";
   
    $posts = Post::obtenerPostsDeUsuario($_SESSION['username']);

    foreach($posts as $post){
        $content .= "<div style=" . "\"display: inline-block;\" " . ">";
        $content .= $post->generatePostHTML();
        $content .= "</div> <br><br>";
    }

    return $content;
}
