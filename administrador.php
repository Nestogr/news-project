<?php

require 'comprobar_sesion.php';
comprobar_sesion();
comprobar_admin();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,user-scalable=no">
    <!--Bootstrap-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Javascript-->
    <script type="text/javascript" src="js/datos.js"></script>
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
        <a class="navbar-brand" href="#">Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#plegado">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="plegado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="#">Comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="registrado.php">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="registrado.php">Añadir noticia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="" onclick="return cerrarSesion()">Cerrar sesión</a>
                </li>

            </ul>

        </div>
    </nav>
    <br>
    <div class=" container">
        <div class="row">
            <div class="col" id="contenido">
                <div class="prueba">
                    <h2>Prueba</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cumque sequi
                        temporibus
                        officiis! Incidunt doloremque ipsa debitis libero quos perferendis veniam in,
                        earum animi optio
                        laudantium aliquid sit at molestiae!</p>
                </div>
                <div class="prueba">
                    <h2>Prueba</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cumque sequi
                        temporibus
                        officiis! Incidunt doloremque ipsa debitis libero quos perferendis veniam in,
                        earum animi optio
                        laudantium aliquid sit at molestiae!</p>
                </div>
                <div class="prueba">
                    <h2>Prueba</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cumque sequi
                        temporibus
                        officiis! Incidunt doloremque ipsa debitis libero quos perferendis veniam in,
                        earum animi optio
                        laudantium aliquid sit at molestiae!</p>
                </div>
                <div class="prueba">
                    <h2>Prueba</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia cumque sequi
                        temporibus
                        officiis! Incidunt doloremque ipsa debitis libero quos perferendis veniam in,
                        earum animi optio
                        laudantium aliquid sit at molestiae!</p>
                </div>


            </div>
        </div>

    </div>

</body>

</html>