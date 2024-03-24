<?php

require_once '../../Config.php';

function generateHeader(){

    $html =<<<EOS
        <p> 2Music ¡Música sin limites para perder el tiempo! </p>\n
    EOS;

    return $html;
}

function generateFormulary(){

    $procesarLoginPath = RUTA_HELPERS_PATH.'/ProcesarLogin.php';
    $registerPath = RUTA_VISTAS_PATH.'/log/SignUpUser.php';

    $html =<<<EOS
    <fieldset class= "formLogin"">
        <legend> Login </legend>
                <form action="$procesarLoginPath" method="post">
                        <label> Username </label>
                        <input type="text" name="username">
                
                        <label> Password </label>
                        <input type="password" name="password">
                    <button type="submit"> Log in </button>
                </form>
         <p> ¿No tienes cuenta? <a href="$registerPath"> Regístrate </a></p>
    </fieldset>
    EOS;

    return $html;
}
