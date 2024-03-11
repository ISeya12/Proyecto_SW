<?php 

require_once '../Config.php';
require_once RUTA_CLASSES.'/Usuario.php'; 

//Obtener el input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST['password'] ?? null;

//Comprobar credenciales
$isValid = checkUser($username, $password);

//Iniciar sesion o pedir de nuevo la cuenta
if($isValid){
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
    
    header('Location: '.RUTA_VISTAS.'Foro.php');
    exit();
}
else{
    header('Location: '.RUTA_VISTAS.'Login.php'); 
    exit();
}

function checkUser($user, $pass){
    return Usuario::login($user, $pass); 
}
