function cerrarSesion() {
    /*cerrar sesión*/
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert("Sesion cerrada con éxito");
            location.href = "index.php";
        }
    };
    xhttp.open("GET", "logout_json.php", true);
    xhttp.send();
    return false;
}

function iniciarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           
            if (this.responseText === "FALSE") {
                alert("Se produjo un error, revise los campos.");
            } else {
                alert("Inicio de sesión completado con éxito");
                location.href = "registrado.php";
            }
        }
    }
    var params = "usuario=" + document.getElementById("usuario").value
        + "&clave=" + document.getElementById("passw").value;
    xhttp.open("POST", "login_json.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}


function iniciarAdmin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText === "FALSE") {
                alert("Se produjo un error, revise los campos.");
            } else {
                alert("Inicio de sesión completado con éxito");
                location.href = "administrador.php";
            }
        }
    }
    var params = "usuario=" + document.getElementById("usuario").value
        + "&clave=" + document.getElementById("passw").value;
    xhttp.open("POST", "login_json.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
    return false;
}

