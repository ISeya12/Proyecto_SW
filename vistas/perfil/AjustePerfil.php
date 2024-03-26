<?php

require_once '../../Config.php';

require_once RUTA_CLASSES.'/Usuario.php'; 


$perfil= Usuario::buscaUsuario($_SESSION['username']); 


/*$_SESSION['username']*/

//Primero comprobar si es artista 

$form_modificar= <<<EOS
    <section class= "formulario_style">
    <form> 
    <fieldset class= "formRegistro">
    <legend> Modifica tu cuenta </legend> 
        <form method="post">
        
            <input hidden name="isArtist" value="0"> 
            <label> Nickname </label>
            <p></p> 
            <input required type="text" name= "new_nickname" value= >

            <p></p> 

            <label> Username (Ej: paco03) </label>
            <p></p> 
            <input required type="text" name="new_username">
                
            <p></p> 
                
            <label> Email </label>
            <p></p> 
            <input required type="text" name="new_email">
      
            <p></p> 

            <label> Password </label>
            <p></p> 
            <input required type="password" name="new_password">
                
            <p></p> 
                
            <label> Birthdate </label>
            <p></p> 
            <input required type="date" name="new_birthdate">
            <p></p> 
            <button type="submit" name="register_button" > Sign In </button>
        </form>
    </fieldset>
    </form> 
    </section> 
EOS; 


$content= <<<EOS
    $form_modificar

EOS; 


require_once RUTA_LAYOUTS; 






