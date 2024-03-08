<?php

require_once '../scripts/helpers_vista/Cabecera_sesion.php';

$contenido = mostrarSaludo();
$header = <<<EOS
$contenido
EOS;
?> 

<header> 

   <?= $header?>   
   
   <!-- Implementacion barra de busqueda -->
   <form  action= "./Login.php"  method= "post"> 
        <p> Barra de busqueda </p> 
        <input type= "search" value= " ">
        <select name= "filtro"> 
            <option value= "art"> Artista </option> 
            <option value= "user"> Usuario </option> 
            <option value= "ambos" selected> Ambos </option> 
        </select> 
    </form> 
</header> 