<?php

require_once 'bd.php';

    

    $usuario = comprobar_usuario($_POST['usuario'], $_POST['clave']);
    if ($usuario === false) {
        echo "FALSE";
    } else {
        session_start();
        
        $_SESSION['usuario'] = $_POST['usuario'];
        var_dump($_SESSION['usuario']);
        echo "TRUE";
    }