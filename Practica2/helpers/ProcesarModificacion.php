<?php 

<<<<<<< HEAD:Practica2/helpers/ProcesarModificacion.php
$id = $_POST['ModificarID'];
$user = null;

if(isset($_SESSION['username']))
    $user = $_SESSION['username'];

$isValid = true;

if($isValid && $user){
    $post = Post::buscarPostPorID($id);
    $usuario = Usuario::buscaUsuario($post->getAutor());
    Post::actualizaPost($post);
}
=======
require_once 'Config.php';

$id = $_POST['id_padre'];
$post = Post::buscarPostPorID($id);
Post::actualizaPost($post);
header('Location: Foro.php');
exit();

>>>>>>> ffca1050ae59b3fb37b1c301c48bf8780591107d:ProcesarModificacion.php

header('Location: Foro.php');
exit();