<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sign In </title>
</head>

<body>
    
    <div style="background-color: green;">
        <div style="background-color: greenyellow; display: inline-block;">
            <img src="https://static-00.iconduck.com/assets.00/profile-default-icon-2048x2045-u3j7s5nj.png"  alt="foto de perfil" height="200" width="200">
        </div>
    </div>

    <div style="margin-top: 15px;"><label> Registra tu nueva cuenta de usuario! </label></div>
    <div style="display: inline-block; background-color: lightgray;">
        <form action="ProcesarRegistro.php" method="post">
            <fieldset>
                <div>

                    <input hidden name="isArtist" value="0">
                    <div>
                        <div><label> Username </label></div>
                        <div><input required type="text" name="new_username"></div>
                    </div>
            
                    <div>
                        <div><label> Email </label></div>
                        <div><input required type="text" name="new_email"></div>
                    </div>
            
                    <div>
                        <div><label> Password </label></div>
                        <div><input required type="password" name="new_password"></div>
                    </div>
            
                    <div>
                        <div><label> Birthdate </label></div>
                        <div><input required type="date" name="new_birthdate"></div>
                    </div>
                </div>

                <div style="margin-top: 20px; display: inline-block;">
                    <button type="submit" name="register_button" style="background-color: lightgreen;"> Sign In </button>
                </div>
            </fieldset>
        </form>
    </div>

    <div>
        <p> Eres un artista? <a href="SignUpArtist.php"> Crea tu cuenta aquí </a></p>
    </div>

</body>
</html>