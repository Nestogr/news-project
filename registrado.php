<?php
   
   require 'comprobar_sesion.php';
   comprobar_sesion();
   comprobar_registrado();
   

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
        <a class="navbar-brand" href="#">Bienvenido, <?php
echo $_SESSION['usuario'];

?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#plegado">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="plegado">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href=""
                        onclick="return cargarComentarios()">Comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="" onclick="return cargarNoticias()">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="" onclick="return cerrarSesion()">Cerrar sesión</a>
                </li>

            </ul>

        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">

                <form onsubmit="return editarNoticia();" method="post" id="formulario3" style="display:none">
                    <div class="form-group">

                        <label> Titular:</label>
                        <input class="form-control" id="titularEditar" type="text">
                        <label> Contenido:</label>
                        <textarea class="form-control" id="contenidoNoticiaEditado" cols="30" row="2"></textarea>
                        <input type="hidden" id="editarID">

                    </div>
                    <input class=" btn btn-success btn-lg" value="Editar" type="submit">
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col">

                <form onsubmit="return anadirNoticia();" method="post" id="formulario2" style="display:none">
                    <div class="form-group">

                        <label> Titular:</label>
                        <input class="form-control" id="titular" name="titular" type="text">
                        <label> Contenido:</label>
                        <textarea class="form-control" id="contenidoNoticia" cols="30" row="2"></textarea>

                    </div>
                    <input class=" btn btn-success btn-lg" value="Enviar" type="submit">
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col" id="form">
                <form onsubmit="return anadirComentario();" method="post" id="formulario1" style="display:none">
                    <input type="hidden"
                        value="<?php echo $_SESSION['usuario'] ?>"
                        id="usuario">
                    <div class="form-group">

                        <label> Contenido:</label>
                        <textarea class="form-control" id="contenidoComentario" cols="30" row="2"></textarea>

                    </div>
                    <br>
                    <input class='btn btn-success btn - lg' value='Enviar' type='submit'>
                </form>

                <br>

            </div>
        </div>
        <div class="row">
            <div class="col" id="contenido">



            </div>
        </div>

    </div>

</body>

</html>