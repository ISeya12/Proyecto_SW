<?php

function islogged()
{
    return isset($_SESSION['username']);
}

function sameUser($idUsuario)
{
    return islogged() && $_SESSION['username'] == $idUsuario;
}

