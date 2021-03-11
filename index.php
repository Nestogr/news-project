<?php



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,user-scalable=no">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/datos.js">
    cargarNoticias();
    </script>
    <script type="text/javascript" src="js/sesion.js"></script>
    <!--Plugins de Javascript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <!--Plugins Bootstrap de Javascript-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
    #contenido>div {
        margin-bottom: 10px;
        padding: 5px;
        background-color: lightgray;
    }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-md	navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Bienvenido</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#plegado">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="plegado">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                    <a class="nav-link" style="color: white" href="" onclick="return cargarNoticias()">Noticias</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="login.php">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="registro.php">Registrarse</a>
                </li>

            </ul>

        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col" id="contenido">

           

            </div>
        </div>

    </div>

</body>

</html>