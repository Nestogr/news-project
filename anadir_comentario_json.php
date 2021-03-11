<?php

require_once 'bd.php';

$usuario = $_POST['usuario'];
$contenido = $_POST['contenidoComentario'];
var_dump($usuario);
var_dump($contenido);




$resultado = anadir_comentario($usuario, $contenido);



echo json_encode($resultado);
