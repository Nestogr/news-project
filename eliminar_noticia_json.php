<?php

require_once 'bd.php';

$id = $_POST['id'];

$json = eliminar_noticia($id);

echo json_encode($json);
