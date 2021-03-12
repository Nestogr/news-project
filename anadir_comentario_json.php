<?php

require_once 'bd.php';


$usuario = $_POST['usuario'];
$contenido = $_POST['contenidoComentario'];





$resultado = anadir_comentario($usuario, $contenido);



echo json_encode($resultado);
