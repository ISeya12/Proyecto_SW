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

    <p> Registra tu nueva cuenta de artista! </p>
    <div class="form_div" style="display: inline-block; background-color: lightgray; width: 250px;">
        <fieldset>
        <label> Register </label>
        <form name="register_form" action="ProcesarRegistro.php" method="post">

            <input hidden name="isArtist" value="1">
            <div class="artist_inputs">
                <div class="username_input_div">
                    <div><label> Username </label></div>
                    <div><input required type="text" name="new_username"></div>
                </div>
        
                <div class="email_input_div">
                    <div><label> Email </label></div>
                    <div><input required type="email" name="new_email"></div>
                </div>
        
                <div class="password_input_div">
                    <div><label> Password </label></div>
                    <div><input required type="password" name="new_password"></div>
                </div>
        
                <div class="birtdate_input_div">
                    <div><label> Birthdate </label></div>
                    <div><input required type="date" name="new_birthdate"></div>
                </div>

                <div style="margin-top: 10px;">
                    <div style="display: inline-block; margin-bottom: 5px;"><label> Musical genre: </label></div>
                    <select name="musical_genres">
                        <option>  </option>
                        <option> Rock </option>
                        <option> Pop </option>
                        <option> Rap </option>
                        <option> Hip Hop </option>
                        <option> Latina </option>
                        <option> Jazz </option>
                        <option> R&B </option>
                    </select>
                </div>
            </div>

            <div class="register_button_div" style="margin-top: 20px; display: inline-block;">
                <button type="submit" name="register_button" style="background-color: lightgreen;"> Sign In </button>
            </div>
        </form>
        </fieldset>
    </div>
</body>
</html>