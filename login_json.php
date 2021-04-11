<?php

require_once 'bd.php';
require 'comprobar_sesion.php';
redirigir();


    

    $usuario = comprobar_usuario($_POST['usuario'], $_POST['clave']);
   
    if ($usuario === FALSE) {
        echo "FALSE";
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        echo "TRUE";
    }
