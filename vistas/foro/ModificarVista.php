<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';

$post = Post::buscarPostPorID($_POST['ModificarID']);
$content = modificatePost($post->getTexto(), $post->getId());

require_once RUTA_LAYOUTS;