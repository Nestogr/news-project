
//usuarios
function registrarUsuario() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "true") {
                alert("Registro completado con éxito");
                location.href = "index.php";

            } else {
                alert("Se produjo un error, el nombre de usuario ya está en uso.");

            }
        }
    };
    var params = "usuario=" + document.getElementById("usuario").value
        + "&clave=" + document.getElementById("passw").value
        + "&correo=" + document.getElementById("correo").value;
    xhttp.open("POST", "registro_json.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}

//noticias
function cargarNoticias() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var noticias = JSON.parse(this.responseText);
                var contenedorPadre = document.getElementById("contenido");
                contenedorPadre.innerHTML = "";
                document.getElementById("formulario").style.display = "none";
                contenedores = plantillaNoticias(noticias);
            } catch (e) {
                alert("Error en noticias");
            }

        }
    };
    xhttp.open("GET", "noticias_json.php", true);
    xhttp.send();
    return false;
}


function plantillaNoticias(noticias) {
    var contenedorPadre = document.getElementById("contenido");

    for (var i = 0; i < noticias.length; i++) {
        var contenedor = document.createElement("div");
        var titular = document.createElement("h2");
        var contenido = document.createElement("p");
        titular.innerHTML = noticias[i]['titular'];
        contenido.innerHTML = noticias[i]['contenido'];
        contenedor.appendChild(titular);
        contenedor.appendChild(contenido);
        contenedorPadre.appendChild(contenedor);


    }

}


function cargarNoticiasAdmin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var noticias = JSON.parse(this.responseText);
                var contenedorPadre = document.getElementById("contenido");
                contenedorPadre.innerHTML = "";
                document.getElementById("formulario").style.display = "none";
                contenedores = plantillaNoticiasAdmin(noticias);
            } catch (e) {
                alert("Error en noticias");
            }

        }
    };
    xhttp.open("GET", "noticias_json.php", true);
    xhttp.send();
    return false;
}




function plantillaNoticiasAdmin(noticias) {
    var contenedorPadre = document.getElementById("contenido");
      //creamos el botón para añadir una noticia:
      var anadir = " <input class='btn btn-primary btn - lg' value='Añadir noticia' type='button' onclick='formularioNoticia()'/>";
      var boton = document.createElement("label");
      boton.id = "botonNoticia";
      boton.innerHTML = anadir;
      contenedorPadre.appendChild(boton);

    for (var i = 0; i < noticias.length; i++) {
        var contenedor = document.createElement("div");
        var titular = document.createElement("h2");
        var contenido = document.createElement("p");
        titular.innerHTML = noticias[i]['titular'];
        contenido.innerHTML = noticias[i]['contenido'];


        var eliminar = " <input class='btn btn-danger btn - lg' value='Eliminar' type='button' onclick='eliminarNoticia(" + noticias[i]['id'] + ")'/>";
        var editar = " <input class='btn btn-success btn - lg' value='Editar' type='button' onclick='editarNoticia(" + noticias[i]['id'] + ")'/>";
        var botones = eliminar + editar;
        var grupoBotones = document.createElement("div");
        grupoBotones.innerHTML = botones;

        contenedor.appendChild(titular);
        contenedor.appendChild(contenido);
        contenedor.appendChild(grupoBotones);
        contenedorPadre.appendChild(contenedor);


    }

}

//eliminar y editar noticias

function eliminarNoticia(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "true") {
                alert("Noticia eliminada con éxito");
                cargarNoticiasAdmin();
            } else {
                alert("Se produjo un error, no se pudo eliminar la noticia seleccionada.");
            }
        }
    };
    var params = "id=" + id;
    xhttp.open("POST", "eliminar_noticia_json.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}


//comentarios

function cargarComentarios() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var comentarios = JSON.parse(this.responseText);
               
                var contenedorPadre = document.getElementById("contenido");
                contenedorPadre.innerHTML = "";
                contenedores = plantillaComentarios(comentarios);
                document.getElementById("formulario").style.display = "none";
            } catch (e) {
                alert("Error en comentarios");
            }

        }
    };
    xhttp.open("GET", "comentarios_json.php", true);
    xhttp.send();
    return false;
}

function plantillaComentarios(comentarios) {
    var contenedorPadre = document.getElementById("contenido");
    //creamos el botón para añadir un comentario:
    var anadir = " <input class='btn btn-primary btn - lg' value='Añadir comentario' type='button' onclick='formularioComentario()'/>";
    var boton = document.createElement("label");
    boton.id = "botonComentario";
    boton.innerHTML = anadir;
    contenedorPadre.appendChild(boton);


    for (var i = 0; i < comentarios.length; i++) {
        var contenedor = document.createElement("div");
        var usuario = document.createElement("h5");
        var contenido = document.createElement("p");
        usuario.innerHTML = "Escrito por " + comentarios[i]['usuario'];
        contenido.innerHTML = comentarios[i]['contenido'];
        contenedor.appendChild(usuario);
        contenedor.appendChild(contenido);
        contenedorPadre.appendChild(contenedor);


    }

}

function formularioComentario()
{
   document.getElementById("formulario").style.display = "block";
}


function anadirComentario() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            try {
                alert("Comentario añadido con éxito");
                cargarComentarios();
            } catch (e) {
                alert("Error al intentar añadir el comentario.");
            }
        }
    };
    var params = "usuario=" + document.getElementById("usuario").value
        + "&contenidoComentario=" + document.getElementById("contenidoComentario").value;
    xhttp.open("POST", "anadir_comentario_json.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}