<?php

function islogged()
{
    return isset($_SESSION['username']);
}

function sameUsser($idUsuario)
{
    return islogged() && $_SESSION['username'] == $idUsuario;
}
