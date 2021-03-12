<?php

require_once 'bd.php';


$id = $_GET['id'];
$noticia = cargar_noticia($id);
$json = json_encode(iterator_to_array($noticia), true);
echo $json;
