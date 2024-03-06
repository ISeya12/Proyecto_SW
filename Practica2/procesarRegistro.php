<?php

$input_valid = true;

//  Common user inputs
$username = filter_input(INPUT_POST, 'new_username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'new_email', FILTER_SANITIZE_SPECIAL_CHARS);
$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$birthdate = $_POST['new_birthdate'];
$isArtist = boolval($_POST['isArtist']);

//  Artist inputs
$musical_genres;



echo "$username <br>";
echo "$email <br>";
echo "$password <br>";
echo "$birthdate <br>";

if(!$isArtist){
    $artist_members = null;
}
else{
    $artist_members = $_POST['musical_genres'];
}

if(isValidBirthdate($_POST['new_birthdate'], getdate(null), $isArtist)){
    echo 'fecha valida';
}
else{
    echo 'fecha invalida';
}

function isValidBirthdate(string $date, $actual_date, bool $isArtist){

    //  Si es un artista -> Comprobar que la fecha sea anterior a la actual
    //  Si es un usuario -> Comprobar que sea mayor de 18 años
    if($isArtist){
        return true;
    }
    else{
        return true;
    }
}