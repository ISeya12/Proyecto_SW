<?php

function generateUserImage(){
    $iconImage = RUTA_IMG_PATH.'/RegisterUserImage.png';
    $image =<<<EOS
        <img src="$iconImage"  alt="foto de perfil" height="200" width="200">
    EOS;

    return $image;
}

function generateArtistAccountLink(){
    $enlace = RUTA_VISTAS_PATH.'/log/SignUpArtist.php';
    return "<p> Eres un artista? <a href= $enlace> Crea tu cuenta aquí </a></p>";
}

function generateFormularyUser(){

    $enlace = RUTA_HELPERS_PATH.'/ProcesarRegistro.php';
    $form =<<<EOS
        <fieldset class= "formRegistro">
        <legend> Registra tu nueva cuenta de usuario </legend> 
        <form action= $enlace method="post">
            
                <input hidden name="isArtist" value="0"> 
                <label> Nickname </label>
                <p> </p> 
                <input required type="text" name= "new_nickname">

                <p> </p> 

                <label> Username (Ej: paco03) </label>
                <p> </p> 
                <input required type="text" name="new_username">
                    
                <p> </p> 
                    
                <label> Email </label>
                <p> </p> 
                <input required type="text" name="new_email">
          
                <p> </p> 

                <label> Password </label>
                <p> </p> 
                <input required type="password" name="new_password">
                    
                <p> </p> 
                    
                <label> Birthdate </label>
                <p> </p> 
                <input required type="date" name="new_birthdate">
                <p> </p> 
                <button type="submit" name="register_button" > Sign In </button>
        </form>
        </fieldset>
    EOS;

    return $form;
}

function generateFormularyArtist(){

    $enlace = RUTA_HELPERS_PATH.'/ProcesarRegistro.php';
    $form =<<<EOS
        <fieldset class= "formRegistro">
        <legend> Registra tu nueva cuenta de artista </legend> 
        <form action= $enlace method="post">
            
                <input hidden name="isArtist" value="1"> 
                <label> Nickname </label>
                <p> </p> 
                <input required type="text" name= "new_nickname">

                <p> </p> 

                <label> Username (Ej: paco03) </label>
                <p> </p> 
                <input required type="text" name="new_username">
                    
                <p> </p> 
                    
                <label> Email </label>
                <p> </p> 
                <input required type="text" name="new_email">
          
                <p> </p> 

                <label> Password </label>
                <p> </p> 
                <input required type="password" name="new_password">
                    
                <p> </p> 
                    
                <label> Birthdate </label>
                <p> </p> 
                <input required type="date" name="new_birthdate">
                <p> </p> 

                <label> Musical genre: </label></div>
                <select name="musical_genres">
                    <option>  </option>
                    <option> Pop </option>
                    <option> Rock </option>
                    <option> Rap </option>
                    <option> Hip Hop </option>
                    <option> Latino </option>
                    <option> Jazz </option>
                    <option> R&B </option>
                    <option> K-Pop </option>
                    <option> J-Pop </option>
                    <option> Dubstep </option>
                    <option> Clásica </option>
                    <option> Disco </option>
                    <option> Funk </option>
                    <option> Jazz </option>
                    <option> Reggae </option>
                    <option> Metal </option>
                </select>

                <p> </p> 
                <button type="submit" name="register_button" > Sign In </button>
        </form>
        </fieldset>
    EOS;


    return $form; 
}