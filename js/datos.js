function registrarUsuario(formulario) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "true") {
                alert("Registro completado con éxito");
                location.href="index.php";
               
            } else {
                alert("Se produjo un error, revise los campos.");
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


