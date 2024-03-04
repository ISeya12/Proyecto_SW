<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
</head>

<body>

    <div style="background-color: lightgreen; text-align: center; ">
        <header> 2Music ¡Música sin limites para perder el tiempo! </header>
    </div>

    <div>
        <fieldset style="width: fit-content; ">
            <legend style="text-align: center;"> Login </legend>
            <div style="width: fit-content; text-align: center;">
                <div>
                    <form action="procesarLogin.php" method="post">
                        <div>
                            <div><label> Username </label></div>
                            <div><input type="text" name="username"></div>
                        </div>
                        <div>
                            <div><label> Password </label></div>
                            <div><input type="text" name="password"></div>
                        </div>
        
                        <button type="submit"> Log in </button>
                    </form>
                </div>
        
                <div>
                    <p> ¿No tienes cuenta? <a href="signIn.html"> Regístrate </a></p>
                </div>
            </div>
        </fieldset>
    </div>
    

</body>
</html>