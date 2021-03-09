<?php

function comprobar_sesion()
{
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
    }
}

function comprobar_admin()
{
    if ($_SESSION['usuario'] != 'Admin') {
        header("Location: index.php");
    }
}

function comprobar_registrado()
{
    if ($_SESSION['usuario'] == 'Admin') {
        header("Location: index.php");
    }
}