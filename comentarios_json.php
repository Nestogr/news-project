<?php

require_once 'bd.php';

$comentarios = cargar_comentarios();

$json = json_encode(iterator_to_array($comentarios), true);
echo $json;
