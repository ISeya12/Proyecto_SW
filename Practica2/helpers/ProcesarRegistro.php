<?php

require_once '../Config.php';
require_once RUTA_CLASSES.'/Usuario.php'; 

//Opciones comunes
$username = filter_input(INPUT_POST, 'new_username', FILTER_SANITIZE_SPECIAL_CHARS);
$nickname = filter_input(INPUT_POST, 'new_nickname', FILTER_SANITIZE_SPECIAL_CHARS); 
$email = filter_input(INPUT_POST, 'new_email', FILTER_SANITIZE_SPECIAL_CHARS);
$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$birthdate = $_POST['new_birthdate'];
$isArtist = boolval($_POST['isArtist']);


//Opciones de artista
$musical_genres;


if(!$isArtist)
    $artist_members = null;
else
    $artist_members = $_POST['musical_genres'];

$usuario= Usuario::createUser($username, $email, $nickname, $password, $birthdate, $isArtist);

if($usuario) {
    $_SESSION['username']= $username; 
    header("Location: Foro.php");
}
else 
    header("Location: SignUpUser.php"); 