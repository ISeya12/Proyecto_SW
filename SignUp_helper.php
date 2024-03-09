<?php

require_once 'Config.php';

function generateUserImage(){

    $image =<<<EOS
    <div style="background-color: green;">
        <div style="background-color: greenyellow; display: inline-block;">
            <img src="img/register_user_image.png"  alt="foto de perfil" height="200" width="200">
        </div>
    </div>
    EOS;

    return $image;
}

function generateArtistAccountLink(){
    return "<div><p> Eres un artista? <a href='SignUpArtist.php'> Crea tu cuenta aquí </a></p></div>";
}

function generateFormularyUser(){

    $text = "<div style='margin-top: 15px;'><label> Registra tu nueva cuenta de usuario! </label></div>\n";
    $form =<<<EOS
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
                        <div><label> Nickname </label></div>
                        <div><input required type="text" name= "new_nick"></div>

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
    EOS;

    return "$text" . "$form";
}

function generateFormularyArtist(){

    $text = "<p> Registra tu nueva cuenta de artista! </p>\n";
    $form =<<<EOS
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
    EOS;

    return "$text" . "$form"; 
}