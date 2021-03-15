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


//Noticias

function cargar_noticias()
{
    $bd = conectarBD();
    $sql = "SELECT * FROM noticias";
    $resul = $bd->query($sql);

    if (!$resul) {
        return false;
    }
    if ($resul->rowCount() === 0) {
        return false;
    }
   
    return $resul;
}

function cargar_noticia($id)
{
    $bd = conectarBD();
    $sql = "SELECT * FROM noticias WHERE id = $id";
    $resul = $bd->query($sql);
    if (!$resul) {
        return false;
    }
    if ($resul->rowCount() === 0) {
        return false;
    }
   
    return $resul;
}



function eliminar_noticia($id)
{
    $bd = conectarBD();

    $sql = "DELETE from noticias where id = '$id'";
    $resul = $bd->query($sql);

    if (!$resul) {
        return false;
    }

    return true;
}

function editar_noticia($id, $titular, $contenido)
{
    $bd = conectarBD();

    $sql = "UPDATE noticias SET titular='$titular', contenido='$contenido' WHERE id='$id'";
    $resul = $bd->query($sql);

    if (!$resul) {
        return false;
    }

    return true;
}

function anadir_noticia($titular, $contenido)
{
    $bd = conectarBD();
    $insertarQuery = "INSERT INTO `noticias` (`id`, `titular`, `contenido`) VALUES (NULL, '$titular', '$contenido');";
    $resul = $bd->query($insertarQuery);

    if (!$resul) {
        return false;
    }
    return true;
}

//Comentarios

function cargar_comentarios()
{
    $bd = conectarBD();
    $sql = "SELECT * from comentarios";
    $resul = $bd->query($sql);

    if (!$resul) {
        return false;
    }
    if ($resul->rowCount() === 0) {
        return false;
    }
   
    return $resul;
}


function anadir_comentario($usuario, $contenido)
{
    $bd = conectarBD();
    $insertarQuery = "INSERT INTO `comentarios` (`usuario`, `contenido`) VALUES ('$usuario', '$contenido');";
    $resul = $bd->query($insertarQuery);

    if (!$resul) {
        return false;
    }
    return true;
}

function eliminar_comentario($id)
{
    $bd = conectarBD();

    $sql = "DELETE from comentarios where num = '$id'";
    $resul = $bd->query($sql);

    if (!$resul) {
        return false;
    }

    return true;
}
