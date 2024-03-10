<?php

require_once 'Config.php';

$content = showProfile();

require_once 'Layout.php';

function showProfile(){
    if (!isset($_SESSION['username'])){
        $html= "<p> No estas logead@,  <a href= 'Login.php'> <strong>  pulsa aqui para iniciar sesion </strong> </a> </p>";
    }

    else {
        $html = "<p> Estas viendo tu perfil, @" . $_SESSION['username'] . "</p>";

        $logout = "<p> ¿Quieres cerrar sesión? <a href= 'Logout.php'> <strong> pulsa aquí </strong> </p>"; 

        $html .= $logout; 

    }

    return $html;
}
