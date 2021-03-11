<?php

require_once 'bd.php';

$noticias = cargar_noticias();

$json = json_encode(iterator_to_array($noticias), true);
echo $json;
