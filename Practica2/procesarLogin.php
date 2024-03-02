<?php 

//  Get user input
$username = $_POST['username'];
$password = $_POST['password'];

//  Check credentials
$isValid = checkUser($username, $password);

//  Log user or ask again for his account
if($isValid){
    require ('MainPage.php');
}
else{
    echo '<p> No existe ese usuario o la contraseña no es correcta </p><br>';
}

function checkUser($user, $pass){

    return $user == 'user' && $pass == 'pass';
}

?>