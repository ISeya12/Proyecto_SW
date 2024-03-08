<?php 

//  Get user input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST['password'];

//  Check credentials
$isValid = checkUser($username, $password);

//  Log user or ask again for his account
if($isValid){
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;

    require ('../vistas/MainPage.php');
}
else{
    echo '<p> No existe ese usuario o la contraseña no es correcta </p><br>';
}

function checkUser($user, $pass){
    return $user == 'user' && $pass == 'pass';
}

?>