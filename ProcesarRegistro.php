<?php

require RUTA_CLASSES.'/Usuario.php';

$input_valid = true;

//  Common user inputs
$username = filter_input(INPUT_POST, 'new_username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'new_email', FILTER_SANITIZE_SPECIAL_CHARS);
$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$birthdate = $_POST['new_birthdate'];
$isArtist = boolval($_POST['isArtist']);

//  Artist inputs
$musical_genres;


if(!$isArtist){
    $artist_members = null;
}
else{
    $artist_members = $_POST['musical_genres'];
}

Usuario::createUser($username, $email, null, $password, $birthdate, $isArtist);
