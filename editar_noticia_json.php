<?php

require_once 'bd.php';

$id = $_POST['id'];
$titular = $_POST['titular'];
$contenido = $_POST['contenido'];

$json = editar_noticia($id, $titular, $contenido);

echo json_encode($json);