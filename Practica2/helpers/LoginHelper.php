<?php

require_once '../../Config.php';

function generateHeader(){

    $html =<<<EOS
        <header> 2Music ¡Música sin limites para perder el tiempo! </header>\n
    EOS;

    return $html;
}

function generateFormulary(){

    $procesarLoginPath = RUTA_HELPERS_PATH.'/ProcesarLogin.php';
    $registerPath = RUTA_VISTAS_PATH.'/log/SignUpUser.php';

    $html =<<<EOS
    <fieldset class= "formLogin"">
        <legend> Login </legend>
            <div>
                <form action="$procesarLoginPath" method="post">
                    <div>
                        <div><label> Username </label></div>
                        <div><input type="text" name="username"></div>
                    </div>
                    <div>
                        <div><label> Password </label></div>
                        <div><input type="password" name="password"></div>
                    </div>
    
                    <button type="submit"> Log in </button>
                </form>
            </div>
    
            <div>
                <p> ¿No tienes cuenta? <a href="$registerPath"> Regístrate </a></p>
            </div>
        </div>
    </fieldset>
    EOS;

    return $html;
}
