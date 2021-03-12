<?php

require 'comprobar_sesion.php';
redirigir();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,user-scalable=no">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/datos.js"></script>
    <script type="text/javascript" src="js/sesion.js"></script>
    <style>
    .formulario {
        padding: 15px;
        border: solid 1px black;
        background-color: AliceBlue;
        margin-top: 10px;
    }

    body {
        background-image: url("img/fondo1.jpg");
        background-size: cover;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-6 col offset-md-3 formulario">
                <h2>Iniciar sesión</h2>
                <form onsubmit="return validacion();" method="post">
                    <div class="form-group">

                        <label> Usuario:</label>
                        <input class="form-control" id="usuario" name="usuario" type="text">
                        <label> Contraseña:</label>
                        <input class="form-control" id="passw" name="passw" type="password">

                    </div>
                    <input class="btn btn-dark btn-lg" value="Enviar" type="submit">
                    <input class="btn btn-dark btn-lg" value="Volver" type="button" onclick="location.href='index.php'">
                </form>


            </div>
        </div>

    </div>

    <script type="text/javascript">
    //aqui comprobamos antes de enviar el formulario
    function validacion() {
        var usuario = document.getElementById("usuario").value;
        var clave = document.getElementById("passw").value;

        if (usuario.length == 0) {
            alert("El usuario no puede quedar vacío");
            return false;
        } else {
            if (clave.length == 0) {
                alert("La contraseña no puede quedar vacía");
                return false;
            } else {
                if (usuario == "Admin" && clave == "1234") {
                    return iniciarAdmin();
                } else {
                    return iniciarSesion();
                }
            }

        }


    }
    </script>

</body>

</html>