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

function redirigir()
{
    session_start();
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario'] == 'Admin') {
            header("Location: administrador.php");
        } else {
            header("Location:registrado.php");
        }
    }
}
