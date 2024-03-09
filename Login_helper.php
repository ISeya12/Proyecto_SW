<?php

require_once 'Config.php';

function generateHeader(){

    $html =<<<EOS
    <header> 2Music ¡Música sin limites para perder el tiempo! </header>\n
    EOS;

    return $html;
}

function generateFormulary(){

    $path_procesarLogin = 'ProcesarLogin.php';
    $path_register = 'SignUpUser.php';

    $html =<<<EOS
    <fieldset style="width: fit-content; ">
        <legend style="text-align: center;"> Login </legend>
        <div style="width: fit-content; text-align: center;">
            <div>
                <form action="$path_procesarLogin" method="post">
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
                <p> ¿No tienes cuenta? <a href="$path_register"> Regístrate </a></p>
            </div>
        </div>
    </fieldset>
    EOS;

    return $html;
}