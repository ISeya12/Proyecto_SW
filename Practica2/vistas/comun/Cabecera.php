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
   <form  action= "../scripts/procesarBusqueda.php"  method= "post"> 
        <p> Barra de busqueda </p> 
        <input type= "search"  value= " " name= "contenido">
        <select name= "filtro"> 
            <option value= "art"> Artista </option> 
            <option value= "user"> Usuario </option> 
            <option value= "ambos" selected> Ambos </option> 
        </select> 
    </form> 
</header> 