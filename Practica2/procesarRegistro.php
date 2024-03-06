<?php

$input_valid = true;

//  Common user inputs
$username = checkUsername($_POST['new_username']);
$email = checkEmail($_POST['new_email']);
$password = $_POST['new_password'];
$birthdate = checkBirthdate($_POST['new_birthdate']);

//  Artist inputs
$artist_members;
$musical_genres;

if(!$isArtist){
    $artist_members = null;
    $musical_genres = null;
}
else{
    $artist_members = $_POST['musical_genres'];
    $musical_genres =$_POST['new_artist_members'];
}

function checkUsername(string $u){

    $u = htmlspecialchars(trim(strip_tags($u)));
    if(isUsernameOnDB($u)){
        $input_valid = false;
        return null;
    }
    
    return $u;
}

function checkEmail(string $m){

    if(!filter_var($m, FILTER_VALIDATE_EMAIL)){
        $input_valid = false;
        return null;
    }

    $m = filter_var($m, FILTER_SANITIZE_EMAIL);

    if(isEmailOnDB($m)){
        $input_valid = false;
        return null;
    }

    return $m;
}

function checkBirthdate(string $date){
    //  Si es un usuario corriente -> debe tener al menos 16 años
    //  Si es un artista -> Cualquier fecha anterior al día actual vale
    //  La fecha es devuelta como un string con formato aaaa-mm-dd
    return $date;
}

function isUsernameOnDB(string $data){
    return false;
}

function isEmailOnDB(string $data){
    return false;
}