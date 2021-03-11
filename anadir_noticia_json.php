<?php

require_once 'bd.php';

$titular = $_POST['titular'];
$contenido = $_POST['contenidoNoticia'];
var_dump($usuario);
var_dump($contenido);




$resultado = anadir_noticia($titular, $contenido);



echo json_encode($resultado);
