<?php 

require_once 'Config.php';
require_once 'classes/Usuario.php'; 
//  Get user input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$password = $_POST['password'] ?? null;

//  Check credentials
$isValid = checkUser($username, $password);

//  Log user or ask again for his account
if($isValid){
    $_SESSION['username'] = $username;
    $_SESSION['login'] = true;
    
    header('Location: Foro.php');
}
else{
    header('Location: Login.php'); 
   
}

function checkUser($user, $pass){
    return Usuario::login($user, $pass); 
}
