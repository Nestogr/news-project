<?php

require_once 'bd.php';



$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];



$resultado = registrar_usuario($usuario, $clave, $correo);



echo json_encode($resultado);
