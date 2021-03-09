<?php


//Base de datos
function conectarBD()
{
    $cadena_conexion = 'mysql:dbname=proyectonoticias;host=localhost';
    $usuario = 'root';
    $clave = '';
    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (PDOException $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
}




//Usuarios

function comprobar_usuario($nombre, $clave)
{
    try {
        $bd = conectarBD();
        // Problema en la conexión
        if (!$bd) {
            return false;
        }
        $sql = "select Cod from usuarios where nombre = '$nombre' 
			and clave = '$clave'";
        $resul = $bd->query($sql);
        if ($resul->rowCount() === 1) {
            return $resul->fetch();
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Se produce cualquier otro error
        return false;
    }
}



function registrar_usuario($nombre, $passwd, $correo)
{
    $bd = conectarBD();
    $insertarQuery = "INSERT INTO `usuarios` (`cod`, `nombre`, `correo`, `clave`) VALUES (NULL, '$nombre', '$correo', '$passwd');";
    $resul = $bd->query($insertarQuery);

    if (!$resul) {
        return false;
    }
    return true;
}