<?php

require_once '../../Config.php';
require_once RUTA_CLASSES.'/Post.php';
require_once RUTA_CLASSES.'/Usuario.php';


$post = Post::buscarPostPorID($_POST['ModificarID']);
$content = modificatePost($post->getTexto(), $post->getId());

require_once RUTA_LAYOUTS;

